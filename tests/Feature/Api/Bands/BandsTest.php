<?php

namespace Tests\Feature\Api\Bands;

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
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function authenticated_user_can_store_a_band()
    {
        $this->signIn();

        $band = $this->make(Band::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store'),
            $band->toArray()
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['name' => $band->name]
        ]);

        $this->assertDatabaseHas('bands', $band->toArray());
    }
}
