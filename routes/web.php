<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- AREA PENYEWA ---
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
Route::patch('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');

// --- AREA ADMIN ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/booking', [AdminBookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{id}', [AdminBookingController::class, 'show'])->name('booking.show');
});

require __DIR__.'/auth.php';