<?php

namespace App\Models\Bands;

use App\Classes\ImageProcessor;
use App\Models\Genre;
use App\Models\Country;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};

class Band extends Model
{
    use HasFactory;

    protected $casts = ['started_at' => 'date:Y'];
    protected $fillable = ['name', 'started_at', 'country_id', 'city', 'bio', 'image'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($band) {
            if (request()->filled('image')) {
                $band->image = ImageProcessor::process(
                    'public/bands',
                    request()->get('image')
                );
            }
        });
    }

    /* Relations */

    public function genres() : BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /* Accessors & Mutators */
}
