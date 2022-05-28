<?php

namespace App\Http\Controllers\Web\Bands\Albums;

use App\Models\Bands\{Album, Band};
use App\Http\Controllers\Controller;
use App\Http\Resources\Bands\AlbumResource;

class AlbumController extends Controller
{
    public function show(Band $band, Album $album)
    {
        return view('bands.albums.show', [
            'album' => new AlbumResource(
                $album->load(['band', 'songs', 'creator'])
            ),
        ]);
    }
}
