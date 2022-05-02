<?php

namespace Tests\Unit\Http\Requests\Bands;

use App\Models\Bands\Album;
use App\Models\Bands\Band;
use Tests\BandTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumRequestTest extends BandTestCase
{
    use RefreshDatabase;

    private $band;
    private string $routePrefix = 'api.bands.albums.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->fakeEvent();
        $this->band = $this->create(Band::class);
        $this->signIn();
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function title_is_required()
    {
        $validatedField = 'title';
        $brokenRule = null;

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Album::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }
}
