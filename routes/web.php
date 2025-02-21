<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TimeslotController;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Affichage pour utilisateur non-connecté
Route::get('/', function () {
    $sports = Sport::all();
    return view('sports/index', [
        'sports' => $sports,
    ]);
});

Route::resource('sports', SportController::class)->only(['index', 'show']);
Route::resource('timeslots', TimeslotController::class)->only(['index', 'show']);


// Gestion utilisateur connecté
Route::middleware(['auth'])->group(function () {
    Route::resource('bookings', BookingController::class)->only(['index', 'create', 'store']);
});


// Gestion administrateur
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('sports', SportController::class)->except(['index', 'show']);
    Route::resource('timeslots', TimeslotController::class)->except(['index', 'show']);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
