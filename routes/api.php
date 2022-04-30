<?php

    use App\Http\Controllers\Api\CountryController;
    use App\Http\Controllers\Api\GenreController;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Bands\BandController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::get('countries', CountryController::class)->name('countries.index');
    Route::get('genres', GenreController::class)->name('genres.index');
    Route::get('bands', [BandController::class, 'index'])->name('bands.index');
    Route::post('bands', [BandController::class, 'store'])->name('bands.store');
});
