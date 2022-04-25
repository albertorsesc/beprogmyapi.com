<?php

namespace App\Http\Controllers\Web\Bands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        return view('bands.index');
    }

    public function create()
    {
        return view('bands.create');
    }

    public function show()
    {
        return view('bands.show');
    }
}
