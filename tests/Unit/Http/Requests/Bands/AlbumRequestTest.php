<?php

namespace Tests\Unit\Http\Requests\Bands;

use App\Models\Bands\Album;
use App\Models\Bands\Band;
use Illuminate\Support\Str;
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

    /**
     * @test
     * @throws \Throwable
     */
    public function title_must_not_exceed_255_characters()
    {
        $validatedField = 'title';
        $brokenRule = Str::random(256);

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Album::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function record_label_must_not_exceed_255_characters()
    {
        $validatedField = 'record_label';
        $brokenRule = Str::random(256);

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Album::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function purchase_link_must_be_a_valid_url()
    {
        $validatedField = 'purchase_link';
        $brokenRule = 'not-url.com';

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Album::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function purchase_link_must_not_exceed_255_characters()
    {
        $validatedField = 'purchase_link';
        $brokenRule = 'https://' . Str::random(244) . '.com';

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Album::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }
}
