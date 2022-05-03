<?php

namespace Tests\Feature\Api\Bands\Albums;

use Illuminate\Support\Arr;
use Tests\BandTestCase;
use App\Models\Bands\{Band, Album};
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumsTest extends BandTestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_store_albums_for_a_band()
    {
        $album = $this->make(Album::class);
        $band = $this->create(Band::class);

        $response = $this->postJson(
            route('api.bands.albums.store', $band),
            Arr::except($album->toArray(), 'creator_id')
        );
        $response->assertCreated();
        $response->assertJson(['data' => ['title' => $album->title]]);

        $this->assertDatabaseHas(
            'albums',
            array_merge($album->toArray(), [
                'creator_id' => auth()->id(),
                'band_id' => $band->id
            ])
        );
    }
}
