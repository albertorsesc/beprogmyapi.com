<?php

    use App\Http\Controllers\Api\Bands\BandLinkController;
    use App\Http\Controllers\Api\Bands\SongController;
    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\Bands\BandController;
use App\Http\Controllers\Api\Bands\AlbumController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::get('countries', CountryController::class)->name('countries.index');
    Route::get('genres', GenreController::class)->name('genres.index');
    Route::get('bands', [BandController::class, 'index'])->name('bands.index');
    Route::post('bands', [BandController::class, 'store'])->name('bands.store');
    Route::post('bands/{band}/albums', [AlbumController::class, 'store'])->name('bands.albums.store');
    Route::post('bands/{band}/links', [BandLinkController::class, 'store'])->name('bands.links.store');
    Route::post('albums/{album}/songs', [SongController::class, 'store'])->name('albums.songs.store');
});
