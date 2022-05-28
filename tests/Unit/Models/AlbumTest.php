<?php

namespace Tests\Unit\Models;

use App\Models\Bands\Song;
use App\Models\User;
use Tests\BandTestCase;
use App\Models\Bands\Band;
use App\Models\Bands\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumTest extends BandTestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function album_belongs_to_a_band()
    {
        $this->fakeEvent();
        $album = $this->create(Album::class);

        $this->assertInstanceOf(Band::class, $album->band);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function album_belongs_to_a_creator()
    {
        $this->fakeEvent();
        $album = $this->create(Album::class);

        $this->assertInstanceOf(User::class, $album->creator);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function album_has_many_songs()
    {
        $this->fakeEvent();
        $album = $this->create(Album::class);
        $this->create(Song::class, ['album_id' => $album->id]);

        $this->assertInstanceOf(Song::class, $album->songs->first());
    }
}
