<?php

namespace App\Http\Controllers\Api\Bands;

use App\Models\Bands\Band;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\LinkRequest;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class BandLinkController extends Controller
{
    public function store(LinkRequest $request, Band $band) : JsonResponse
    {
        return response()->json([
            'data' => $band->links()->create($request->all()),
        ], Response::HTTP_CREATED);
    }
}
