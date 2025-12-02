<?php

use App\Http\Controllers\KamarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KamarController as AdminKamarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
    Route::get('/kamar/{id}', [KamarController::class, 'show'])->name('kamar.show');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/kamar', [AdminKamarController::class, 'index'])->name('kamar.index');
    Route::post('/kamar', [AdminKamarController::class, 'store'])->name('kamar.store');
    Route::get('/kamar/{id}', [AdminKamarController::class, 'show'])->name('kamar.show');
    Route::put('/kamar/{id}', [AdminKamarController::class, 'update'])->name('kamar.update');
    Route::delete('/kamar/{id}', [AdminKamarController::class, 'destroy'])->name('kamar.destroy');
});

require __DIR__.'/auth.php';
