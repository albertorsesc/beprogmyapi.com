<?php

namespace App\Http\Controllers\Api\Bands;

use App\Models\Bands\Band;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bands\BandRequest;
use Symfony\Component\HttpFoundation\Response;

class BandController extends Controller
{
    public function store(BandRequest $request): JsonResponse
    {
        return response()->json([
            'data' => Band::create($request->all())
        ], Response::HTTP_CREATED);
    }
}
