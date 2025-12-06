<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagihanController;

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
});

// Penyewa
Route::post('/tagihan', [TagihanController::class, 'store']);
Route::get('/tagihan', [TagihanController::class, 'index']);

// Admin
Route::get('/admin/tagihan', [TagihanController::class, 'adminIndex']);

// Pemilik
Route::get('/pemilik/tagihan', [TagihanController::class, 'pemilikIndex']);

Route::get('/test-tagihan', function () {
    return view('test-tagihan');
});

Route::get('/halaman-tagihan', function () {
    return view('tagihan');
});

require __DIR__.'/auth.php';
