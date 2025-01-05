<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-sucess', function () {
    return view('auth.register-sucess');
})->name('register.sucess');

Route::get('about-us',function(){
    return view('about-us');
})->name('about-us');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');


// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/view', [ProfileController::class, 'show'])->name('profile.show');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Admin Routes with Role Middleware
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


// Customer Routes (optional)
Route::middleware(['auth', RoleMiddleware::class . ':customer'])->group(function () {
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);

Route::get('/cricket/index', [DashboardController::class, 'fetchLiveMatches'])->name('<cricket>index');



});
// Include Authentication Routes
require __DIR__.'/auth.php';
