<?php

namespace App\Http\Controllers\Api\Bands;

use App\Models\Bands\Band;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\BandRequest;
use App\Http\Resources\Bands\BandResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BandController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return BandResource::collection(
            Band::query()
                ->with(['creator', 'genres', 'country'])
                ->orderBy('name')
                ->get()
        );
    }
    public function store(BandRequest $request): JsonResponse
    {
        $band = Band::create($request->except('image'));
        $band->genres()->attach($request->genres);

        return response()->json([
            'data' => new BandResource($band),
        ], Response::HTTP_CREATED);
    }
}
