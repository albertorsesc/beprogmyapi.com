<?php

namespace App\Models\Bands;

use App\Models\Concerns\GrantsRecognition;
use App\Models\User;
use App\Classes\ImageProcessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Album extends Model
{
    use HasFactory;
    use GrantsRecognition;

    protected $touches = ['band'];
    protected $casts = ['released_at' => 'integer'];
    protected $fillable = ['title', 'released_at', 'record_label', 'purchase_link', 'description'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($album) {
            $album->creator_id = auth()->id();
            if (request()->filled('image')) {
                $album->image = ImageProcessor::process(
                    'public/albums',
                    request()->get('image')
                );
            }
        });
    }

    /* Relations */

    public function band() : BelongsTo
    {
        return $this->belongsTo(Band::class);
    }

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function songs() : HasMany
    {
        return $this->hasMany(Song::class)->orderBy('title');
    }
}
