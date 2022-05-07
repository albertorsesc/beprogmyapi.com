<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Recognition extends Model
{
    protected $fillable = ['user_id', 'recognizable_id', 'recognizable_type', 'action', 'description'];

    public function recognizable() : MorphTo
    {
        return $this->morphTo('recognizable', 'recognizable_type', 'recognizable_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
