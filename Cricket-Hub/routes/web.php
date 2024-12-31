<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/view', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');





});




Route::middleware(['auth'])->group(function () {
    Route::resource('teams', TeamController::class);
});

Route::middleware(['auth'])->group(function():void{
    Route::resource('players',PlayerController::class);
});


require __DIR__.'/auth.php';
