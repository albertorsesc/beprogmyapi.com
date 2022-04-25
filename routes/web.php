<?php

    use App\Http\Controllers\SubscriptionController;
    use App\Http\Controllers\Web\Bands\BandController;
    use Illuminate\Support\Facades\Route;

    Route::view('/', 'welcome')->name('welcome');

    Route::post('subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::get('bands', [BandController::class, 'index'])->name('web.bands.index');
        Route::get('bands/create', [BandController::class, 'create'])->name('web.bands.create');
        Route::get('bands/show', [BandController::class, 'show'])->name('web.bands.show');
    });
