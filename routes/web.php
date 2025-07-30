<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlantController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->prefix('klanten')->group(function () {
    Route::get('/', [KlantController::class, 'index']);
    Route::get('/nieuw', [KlantController::class, 'create']);
    Route::post('/', [KlantController::class, 'store']);
    Route::get('/{id}/bewerk', [KlantController::class, 'edit']);
    Route::put('/{id}', [KlantController::class, 'update']);
    Route::delete('/{id}', [KlantController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
