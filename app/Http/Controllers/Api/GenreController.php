<?php

namespace App\Http\Controllers\Api;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'data' => Genre::query()->orderBy('name')->get()
        ]);
    }
}
