<?php

namespace Database\Factories\Bands;

use App\Models\Country;
use App\Models\Bands\Band;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bands\Band>
 */
class BandFactory extends Factory
{
    protected $model = Band::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'country_id' => Country::query()->inRandomOrder()->first()->id,
            'name' => $this->faker->words(2, true),
            'playing_since_year' => $this->faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d'),
        ];
    }
}
