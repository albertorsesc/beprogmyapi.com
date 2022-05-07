<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Bands\Band;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecognitionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @throws \Throwable
     * Example: Using Band.
    */
    public function recognition_belongs_to_a_user()
    {
        $this->loadSeeders([CountrySeeder::class]);
        $this->signIn();
        $band = $this->create(Band::class);

        $this->assertInstanceOf(
            User::class,
            $band->recognitions()->first()->user
        );
    }
}
