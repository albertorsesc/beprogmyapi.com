<?php

namespace Tests\Feature\Api\Bands;

use App\Models\Genre;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;
use App\Models\Bands\Band;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.bands.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([CountrySeeder::class]);
        $this->signIn();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_get_all_bands()
    {
        $this->withoutExceptionHandling();
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
    public function authenticated_user_can_store_a_band()
    {
        $band = $this->make(Band::class);
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

        $this->assertDatabaseHas('bands', $band->toArray());

        $newBand = Band::first();
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
