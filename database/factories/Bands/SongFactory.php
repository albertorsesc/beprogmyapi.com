<?php

namespace Database\Factories\Bands;

use App\Models\Bands\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bands\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'album_id' => Album::factory(),
            'title' => $this->faker->sentence,
            'duration' => $this->getDuration(),
            'lyric' => $this->faker->realText(500),
        ];
    }

    public function getDuration() : string
    {
        return $this->faker->randomNumber(1) .
            $this->faker->randomNumber(1) . ':' .
            $this->faker->randomNumber(1) .
            $this->faker->randomNumber(1);
    }
}
