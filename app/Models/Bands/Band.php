<?php

namespace App\Models\Bands;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $casts = ['playing_since_year' => 'date:Y'];
    protected $fillable = ['name', 'playing_since_year', 'country_id'];
}
