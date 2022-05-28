<?php

namespace App\Http\Controllers\Web\Bands;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bands\BandResource;
use App\Models\Bands\Band;
use App\Models\Recognition;
use Illuminate\Support\Facades\DB;

class BandController extends Controller
{
    public function index()
    {
        return view('bands.index');
    }

    public function show(Band $band)
    {
        return view('bands.show', [
            'band' => new BandResource(
                $band->load([
                    'creator',
                    'country',
                    'genres',
                    'albums.creator:id,name',
                    'links',
                    'recognitions.user:id,name'
                ])
            ),
        ]);
    }
}
