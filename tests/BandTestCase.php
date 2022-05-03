<?php

namespace Tests;

use Database\Seeders\CountrySeeder;

class BandTestCase extends TestCase
{
    protected function setUp () : void
    {
        parent::setUp();
        $this->loadSeeders([CountrySeeder::class]);
    }
}
