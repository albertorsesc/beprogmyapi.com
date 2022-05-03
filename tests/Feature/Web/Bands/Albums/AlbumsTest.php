<?php

namespace Tests\Feature\Web\Bands\Albums;

use App\Models\Bands\Album;
use Tests\BandTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumsTest extends BandTestCase
{
    use RefreshDatabase;

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
    }

    /**
     * @test
     * @throws \Throwable
    */
    public function authenticated_user_can_visit_an_band_album_profile()
    {
        $album = $this->create(Album::class);

        $response = $this->get(route('bands.albums.show', [$album->band, $album]));
        $response->assertOk();
        $response->assertViewIs('bands.albums.show');
        $response->assertViewHas('album');
    }
}
