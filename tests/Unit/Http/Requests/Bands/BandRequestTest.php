<?php

namespace Tests\Unit\Http\Requests\Bands;

use Tests\TestCase;
use App\Models\Bands\Band;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BandRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.bands.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
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
            route($this->routePrefix . 'store'),
            $this->make(Band::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function name_must_be_unique()
    {
        $validatedField = 'name';
        $brokenRule = 'Caligula\'s Horse';

        $this->create(Band::class, [
            $validatedField => $brokenRule
        ]);
        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(Band::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function name_must_not_exceed_255_chars()
    {
        $validatedField = 'name';
        $brokenRule = Str::random(256);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $this->make(Band::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }
}
