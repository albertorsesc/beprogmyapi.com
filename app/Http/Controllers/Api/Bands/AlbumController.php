<?php

namespace App\Http\Controllers\Api\Bands;

use App\Models\Bands\Band;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\AlbumRequest;
use App\Http\Resources\Bands\AlbumResource;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends Controller
{
    public function store(AlbumRequest $request, Band $band) : JsonResponse
    {
        return response()->json([
            'data' => new AlbumResource(
                $band->albums()->create($request->all())
            )
        ], Response::HTTP_CREATED);
    }
}
