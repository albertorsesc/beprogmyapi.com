<?php

namespace App\Http\Controllers\Web\Bands;

use App\Http\Controllers\Controller;
use App\Http\Resources\BandResource;
use App\Models\Bands\Band;
use Illuminate\Http\Request;

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
                $band->load(['country', 'genres'])
            ),
        ]);
    }
}
