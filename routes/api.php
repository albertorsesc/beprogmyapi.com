<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Bands\BandController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::post('/bands', [BandController::class, 'store'])->name('bands.store');
});
