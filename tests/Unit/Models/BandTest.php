<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Bands\{Band, Album};
use Database\Seeders\CountrySeeder;
use App\Models\{Link, User, Genre, Country};
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([CountrySeeder::class]);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function band_belongs_to_a_creator()
    {
        $this->fakeEvent();
        $band = $this->create(Band::class);

        $this->assertInstanceOf(User::class, $band->creator);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function band_has_many_albums()
    {
        $this->fakeEvent();
        $band = $this->create(Band::class);
        $album = $this->create(Album::class);

        $band->albums()->save($album);

        $this->assertInstanceOf(Album::class, $band->albums->first());
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function band_belongs_to_many_genres()
    {
        $this->fakeEvent();
        $band = $this->create(Band::class);
        $genres = $this->create(\App\Models\Genre::class, [], 2)->pluck('id');

        $band->genres()->attach($genres);

        $this->assertInstanceOf(Genre::class, $band->genres->first());
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function band_belongs_to_a_country()
    {
        $this->fakeEvent();
        $band = $this->create(Band::class);

        $this->assertInstanceOf(Country::class, $band->country);
    }

    /**
     *   @test
     *   @throws \Throwable
     */
    public function band_has_many_links()
    {
        $this->fakeEvent();
        $band = $this->create(Band::class);
        $link = $this->make(Link::class);

        $band->links()->create($link->toArray());

        $this->assertInstanceOf(Link::class, $band->fresh()->links->first());
    }
}
