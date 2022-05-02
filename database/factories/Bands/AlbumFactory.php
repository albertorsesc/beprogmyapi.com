<?php

namespace Database\Factories\Bands;

use App\Models\Bands\Band;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bands\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'creator_id' => User::factory(),
            'band_id' => Band::factory(),
            'title' => $this->faker->sentence,
            'released_at' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y'),
            'record_label' => $this->faker->sentence,
        ];
    }
}
