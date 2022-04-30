<?php

namespace Tests\Unit\Models;

use App\Models\Bands\Band;
use App\Models\Country;
use Tests\TestCase;
use App\Models\Genre;
use Database\Seeders\CountrySeeder;
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
    public function band_belongs_to_many_genres()
    {
        $band = $this->create(\App\Models\Bands\Band::class);
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
        $band = $this->create(Band::class);

        $this->assertInstanceOf(Country::class, $band->country);
    }
}
