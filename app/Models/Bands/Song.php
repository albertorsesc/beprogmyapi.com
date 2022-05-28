<?php

namespace App\Models\Bands;

use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\GrantsRecognition;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory;

    protected $touches = ['album'];
    protected $fillable = ['title', 'duration', 'lyric'];

    /* Relations */

    public function album() : BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
