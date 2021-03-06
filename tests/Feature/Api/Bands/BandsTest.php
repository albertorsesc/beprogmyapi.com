<?php

namespace Tests\Feature\Api\Bands;

use App\Models\Genre;
use Tests\BandTestCase;
use App\Models\Bands\Band;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandsTest extends BandTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.bands.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_get_all_bands()
    {
        $band = $this->create(Band::class);
        $genres = $this->create(Genre::class, [], 2);
        $band->genres()->attach($genres->pluck('id'));

        $response = $this->getJson(route($this->routePrefix . 'index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $band->id,
                    'name' => $band->name,
                    'genres' => [
                        ['id' => $genres->find(1)->id],
                        ['id' => $genres->find(2)->id],
                    ],
                    'creator' => ['id' => $band->creator->id],
                    'country' => ['id' => $band->country->id],
                    'city' => $band->city,
                    'bio' => $band->bio,
                ]
            ]
        ]);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_submit_a_band_as_review()
    {
        $band = $this->make(Band::class, ['creator_id' => auth()->id()]);
        [$genre1, $genre2] = $this->create(Genre::class, [], 2);
        $genres = ['genres' => [$genre1->id, $genre2->id]];

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            array_merge($band->toArray(), $genres)
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['name' => $band->name]
        ]);

        $this->assertDatabaseHas(
            'bands',
            array_merge(
                $band->toArray(),
                [
                    'creator_id' => auth()->id(),
                    'status' => Band::REVIEW_STATUS
                ]
            )
        );

        $newBand = Band::first();
        $this->assertTrue($newBand->status === 'review');

        foreach ($genres as $genre) {
            $this->assertDatabaseHas('band_genre', [
                'band_id' => $newBand->id,
                'genre_id' => $genre
            ]);
        }
    }

    /* Notifications */

    public function notification_sent_when_creating_a_new_band()
    {
        $this->markTestSkipped('Not implemented yet');
        Notification::fake();

        $band = $this->make(Band::class);
        [$genre1, $genre2] = $this->create(Genre::class, [], 2);
        $genres = ['genres' => [$genre1->id, $genre2->id]];

        Notification::assertNothingSent();

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            array_merge($band->toArray(), $genres)
        );
        $response->assertCreated();

        Notification::assertSentTo(
            auth()->user(),
            function (NewBandCreated $notification, $channels) use ($band) {
                return $notification->order->id === band->id;
            }
        );
    }
}
