<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountriesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_get_all_countries()
    {
        $this->signIn();
        $this->loadSeeders([CountrySeeder::class]);

        $response = $this->getJson(route('api.countries.index'));
        $response->assertOk();
    }
}
