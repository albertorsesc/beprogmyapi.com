<?php

namespace App\Models\Concerns;

use App\Models\Recognition;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait GrantsRecognition
{
    public static function bootGrantsRecognition ()
    {
        if(auth()->guest()) return;

        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->grantRecognition($event);
            });
        }
    }

    protected function grantRecognition($event) : void
    {
        $this->recognitions()->create([
            'user_id' => auth()->id(),
            'action' => $event,
            'description' => $this->getActionDescription($event),
        ]);
    }

    private static function getActivitiesToRecord () : array
    {
        return ['created', 'updated'];
    }

    public function getActionType(): array
    {
        return ['created', 'updated'];
    }

    private function getActionDescription ($event) : string
    {
        return 'I have ' . $event . ' a new ' . class_basename($this) . '.';
    }

    public function recognitions() : MorphMany
    {
        return $this->morphMany(Recognition::class, 'recognizable');
    }
}
