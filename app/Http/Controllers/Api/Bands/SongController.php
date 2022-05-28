<?php

namespace App\Http\Controllers\Api\Bands;

use App\Models\Bands\Album;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\SongRequest;
use Symfony\Component\HttpFoundation\Response;

class SongController extends Controller
{
    public function store(SongRequest $request, Album $album) : JsonResponse
    {
        return response()->json([
            'data' => $album->songs()->create($request->all())
        ], Response::HTTP_CREATED);
    }
}
