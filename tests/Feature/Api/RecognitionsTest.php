<?php

namespace Tests\Feature\Api;

use Tests\BandTestCase;
use App\Models\Bands\Band;
use Illuminate\Foundation\Testing\RefreshDatabase;

/* Using Band Model as example. */
class RecognitionsTest extends BandTestCase
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
    public function creator_gets_recognition_when_a_recognizable_entity_is_created()
    {
        $band = $this->create(Band::class);

        $this->assertDatabaseHas('recognitions', [
            'recognizable_id' => $band->id,
            'recognizable_type' => get_class($band),
            'user_id' => auth()->id(),
            'action' => 'created',
            'description' => 'I have created a new Band.'
        ]);
    }
}
