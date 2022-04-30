<?php

namespace App\Http\Controllers\Api\Bands;

use App\Http\Resources\BandResource;
use App\Models\Bands\Band;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\BandRequest;
use Symfony\Component\HttpFoundation\Response;

class BandController extends Controller
{
    public function index()
    {
        return BandResource::collection(
            Band::query()
                ->with(['genres', 'country'])
                ->orderBy('name')
                ->get()
        );
    }
    public function store(BandRequest $request): JsonResponse
    {
        $band = Band::create($request->all());
        $band->genres()->attach($request->genres);

        return response()->json([
            'data' => $band
        ], Response::HTTP_CREATED);
    }
}
