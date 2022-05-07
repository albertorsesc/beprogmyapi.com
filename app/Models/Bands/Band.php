<?php

namespace App\Models\Bands;

use App\Classes\ImageProcessor;
use App\Models\{User, Genre, Country};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\{HasLinks, GrantsRecognition, SerializeTimestamps};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};

class Band extends Model
{
    use HasLinks;
    use HasFactory;
    use GrantsRecognition;
    use SerializeTimestamps;

    protected $casts = ['started_at' => 'date:Y'];
    protected $fillable = ['name', 'started_at', 'country_id', 'city', 'bio', 'image'];

    protected static function boot ()
    {
        parent::boot();
        static::creating(function ($band) {
            $band->creator_id = auth()->id();
            if (request()->filled('image')) {
                $band->image = ImageProcessor::process(
                    'public/bands',
                    request()->get('image')
                );
            }
        });
    }

    /* Relations */

    public function albums() : HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

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
