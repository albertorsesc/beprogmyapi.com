<?php

namespace Tests\Feature\Web\Bands\Albums\Songs;

use App\Models\Bands\Album;
use App\Models\Bands\Song;
use Tests\BandTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SongsTest extends BandTestCase
{
    use RefreshDatabase;

    private Album $album;

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->album = $this->create(Album::class);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_visit_an_album_song_profile()
    {
        $song = $this->create(Song::class, ['album_id' => $this->album->id]);

        $response = $this->get(
            route('albums.songs.show', [$this->album, $song])
        );
        $response->assertOk();
        $response->assertViewIs('bands.albums.songs.show');
        $response->assertViewHas('song');
    }
}
