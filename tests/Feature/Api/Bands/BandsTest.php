<?php

namespace Tests\Feature\Api\Bands;

use App\Models\Bands\Band;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BandsTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.bands.';

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
