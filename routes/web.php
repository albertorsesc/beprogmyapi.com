<?php

    use App\Http\Controllers\SubscriptionController;
    use App\Http\Controllers\Web\Bands\Albums\AlbumController;
    use App\Http\Controllers\Web\Bands\BandController;
    use App\Http\Controllers\Web\Bands\SongController;
    use Illuminate\Support\Facades\Route;

    Route::view('/', 'welcome')->name('welcome');

    Route::post('subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::get('bands', [BandController::class, 'index'])->name('bands.index');
        Route::get('bands/{band}', [BandController::class, 'show'])->name('bands.show');
        Route::get('bands/{band}/albums/{album}', [AlbumController::class, 'show'])->name('bands.albums.show');
        Route::get('albums/{album}/songs/{song}', [SongController::class, 'show'])->name('albums.songs.show');
    });
