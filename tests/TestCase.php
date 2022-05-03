<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function signIn($attributes = []) : TestCase
    {
        return $this->actingAs(
            $this->create(User::class, $attributes)
        );
    }

    public function signInAsRoot($attributes = []) : TestCase
    {
        return $this->actingAs(
            $this->create(User::class, array_merge(
                ['email' => config('beprogmyapi.roles.root')[0]],
                $attributes
            ))
        );
    }

    /**
     * factory(Model::class, $amount)->create($attributes);
     *
     * @param $class
     * @param array $attributes
     * @param int $count
     *
     * @return mixed
     */
    public function create($class, array $attributes = [], int $count = 1)
    {
        if ($count > 1) {
            return $class::factory()->count($count)->create($attributes);
        }
        return $class::factory()->create($attributes);
    }

    /**
     * factory()->make();
     *
     * @param $class
     * @param array $attributes
     *
     * @return mixed
     */
    public function make($class, array $attributes = [], int $count = 1)
    {
        if ($count > 1) {
            return $class::factory()->count($count)->make($attributes);
        }
        return $class::factory()->make($attributes);
    }

    public function loadSeeders(array $seeders)
    {
        foreach ($seeders as $seeder) {
            $this->artisan('db:seed --class=' . class_basename($seeder));
        }
    }

    public function fakeEvent($event = null)
    {
        if (! is_null($event)) {
            Event::fake($event);
        } else {
            Event::fake();
        }
    }
}
