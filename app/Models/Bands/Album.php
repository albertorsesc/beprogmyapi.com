<?php

namespace App\Models\Bands;

use App\Classes\ImageProcessor;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $casts = ['released_at' => 'integer'];
    protected $fillable = ['title', 'released_at', 'record_label'];

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
}
