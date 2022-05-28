<?php

namespace Tests\Unit\Models;

use App\Models\Bands\Album;
use App\Models\Bands\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BandTestCase;

class SongTest extends BandTestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function song_belongs_to_an_album()
    {
        $this->fakeEvent();
        $album = $this->create(Album::class);
        $song = $this->create(Song::class, ['album_id' => $album->id]);

        $this->assertInstanceOf(Album::class, $song->album);
    }
}
