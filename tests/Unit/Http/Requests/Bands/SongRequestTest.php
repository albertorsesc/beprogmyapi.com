<?php

namespace Tests\Unit\Http\Requests\Bands;

use Tests\BandTestCase;
use Illuminate\Support\Str;
use App\Models\Bands\{Song, Album};
use Illuminate\Foundation\Testing\RefreshDatabase;

class SongRequestTest extends BandTestCase
{
    use RefreshDatabase;

    private Album $album;
    private string $routePrefix = 'api.albums.songs.';

    protected function setUp () : void
    {
        parent::setUp();
        $this->signIn();
        $this->album = $this->create(Album::class);
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
            route($this->routePrefix . 'store', $this->album),
            $this->make(Song::class, [
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
            route($this->routePrefix . 'store', $this->album),
            $this->make(Song::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function duration_must_not_exceed_255_characters()
    {
        $validatedField = 'duration';
        $brokenRule = Str::random(256);

        $this->postJson(
            route($this->routePrefix . 'store', $this->album),
            $this->make(Song::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function duration_must_have_a_valid_format()
    {
        $validatedField = 'duration';
        $brokenRule = '11.25';

        $this->postJson(
            route($this->routePrefix . 'store', $this->album),
            $this->make(Song::class, [
                $validatedField => $brokenRule
            ])->toArray()
        )->assertJsonValidationErrorFor($validatedField);
    }
}
