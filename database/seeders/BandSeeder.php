<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = [
            [
                'name' => 'Caligula\'s Horse',
                'started_at' => now()->setDateFrom('-30 years')->format('Y'),
                'creator_id' => User::query()->inRandomOrder()->first()->id,
                'country_id' => Country::query()->inRandomOrder()->first()->id,
                'city' => 'Some City',
                'bio' => 'Some bio',
            ]
        ];

        foreach ($bands as $band) {
            Event::fake();
            $newBand = \App\Models\Bands\Band::create($band);
            $newBand->genres()->saveMany(
                Genre::query()->inRandomOrder()->take(3)->get()
            );
        }
    }
}
