<?php

namespace App\Http\Controllers\Web\Bands;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bands\SongResource;
use App\Models\Bands\Album;
use App\Models\Bands\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function show(Album $album, Song $song)
    {
        return view('bands.albums.songs.show', [
            'song' => new SongResource($song)
        ]);
    }
}
