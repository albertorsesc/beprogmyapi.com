<?php

namespace App\Models\Bands;

use App\Classes\ImageProcessor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
