<?php

namespace Tests\Unit\Http\Requests;

use App\Models\Bands\Band;
use App\Models\Link;
use Illuminate\Support\Str;
use Tests\BandTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LinkRequestTest extends BandTestCase
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
    public function name_is_required()
    {
        $validatedField = 'name';
        $brokenRule = null;

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Link::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

    }

    /**
     * @test
     * @throws \Throwable
    */
    public function name_must_not_exceed_255_characters()
    {
        $validatedField = 'name';
        $brokenRule = Str::random(256);

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Link::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

    }

    /**
     * @test
     * @throws \Throwable
    */
    public function url_is_required()
    {
        $validatedField = 'url';
        $brokenRule = null;

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Link::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

    }

    /**
     * @test
     * @throws \Throwable
     */
    public function url_must_not_exceed_255_characters()
    {
        $validatedField = 'url';
        $brokenRule = Str::random(256);

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Link::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

    }

    /**
     * @test
     * @throws \Throwable
     */
    public function url_must_be_have_a_valid_url()
    {
        $validatedField = 'url';
        $brokenRule = 'not-url.com';

        $this->postJson(
            route($this->routePrefix . 'store', $this->band),
            $this->make(Link::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrors($validatedField);

    }
}
