<?php

namespace Tests\Feature\Web\Bands;

use App\Models\Bands\Band;
use App\Models\Genre;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BandsTest extends TestCase
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
    public function authenticated_user_can_visit_a_bands_profile()
    {
        $band = $this->create(Band::class);
        $genres = $this->create(Genre::class, [], 2)->pluck('id');
        $band->genres()->attach($genres);

        $response = $this->get(route('bands.show', $band));
        $response->assertOk();
        $response->assertViewIs('bands.show');
        $response->assertViewHas('band');
    }
}
