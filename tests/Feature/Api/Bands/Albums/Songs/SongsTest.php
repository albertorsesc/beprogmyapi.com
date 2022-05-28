<?php

namespace Tests\Feature\Api\Bands\Albums\Songs;

use App\Models\Bands\Album;
use App\Models\Bands\Song;
use Tests\BandTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SongsTest extends BandTestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.albums.songs.';

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_store_songs_for_an_album()
    {
        $this->signIn();

        $album = $this->create(Album::class);
        $song = $this->make(Song::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store', $album),
            $song->toArray()
        );
        $response->assertCreated();
        $response->assertJson(['data' => ['title' => $song->title]]);

        $this->assertDatabaseHas('songs', [
            'album_id' => $album->id,
            'title' => $song->title,
            'duration' => $song->duration,
            'lyric' => $song->lyric,
        ]);
    }
}
