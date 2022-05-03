<?php

namespace Tests\Feature\Api\Bands;

use App\Models\Link;
use Tests\BandTestCase;
use App\Models\Bands\Band;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandLinksTest extends BandTestCase
{
    use RefreshDatabase;

    private $band;
    private string $routePrefix = 'api.bands.links.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->band = $this->create(Band::class);
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_add_link_to_a_band()
    {
        $link = $this->make(Link::class);

        $response = $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $link->toArray()
        );
        $response->assertCreated();
        $response->assertJson([
            'data' => ['name' => $link->name, 'url' => $link->url]
        ]);

        $this->assertDatabaseHas('links', [
            'name' => $link->name,
            'url' => $link->url,
            'linkable_id' => $this->band->id,
            'linkable_type' => get_class($this->band)
        ]);
    }
}
