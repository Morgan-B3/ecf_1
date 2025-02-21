<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TimeslotController;
use App\Models\Sport;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sports = Sport::all();
    return view('sports/index', [
        'sports' => $sports,
    ]);
});

Route::resource('sports', SportController::class);
Route::resource('timeslots', TimeslotController::class);
Route::resource('bookings', BookingController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
