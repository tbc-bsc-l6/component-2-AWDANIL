<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

/**
 * Public Routes
 * 
 * These routes are accessible without authentication and include:
 * - Welcome Page
 * - Registration Success Page
 * - About Us Page
 * - Contact Us Page
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-sucess', function () {
    return view('auth.register-sucess');
})->name('register.sucess');

Route::get('about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

/**
 * Authenticated Routes
 * 
 * These routes require authentication and include:
 * - Profile Management (edit, update, view, delete)
 * - Dashboard Access
 */
Route::middleware(['auth'])->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Edit profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete profile
    Route::get('/profile/view', [ProfileController::class, 'show'])->name('profile.show'); // View profile

    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/**
 * Admin Routes
 * 
 * These routes are accessible only to users with the "admin" role.
 * Includes:
 * - Resource routes for managing teams and players
 * - Admin-specific dashboard
 */
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::resource('teams', TeamController::class); // CRUD routes for teams
    Route::resource('players', PlayerController::class); // CRUD routes for players

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard'); // Admin dashboard
});

<<<<<<< HEAD
/**
 * Customer Routes
 * 
 * These routes are accessible only to users with the "customer" role.
 * Includes:
 * - Resource routes for teams and players (if applicable)
 * - Access to the Live Cricket Matches
 */
Route::middleware(['auth', RoleMiddleware::class . ':customer'])->group(function () {
    Route::resource('teams', TeamController::class); // CRUD routes for teams
    Route::resource('players', PlayerController::class); // CRUD routes for players

    Route::get('/cricket/index', [DashboardController::class, 'index'])->name('cricket.index'); // Live Cricket Matches
});

// Include Authentication Routes (default Laravel authentication routes)
require __DIR__ . '/auth.php';
=======

// Customer Routes (optional)
//Route::middleware(['auth', RoleMiddleware::class . ':customer'])->group(function () {
  //  Route::resource('teams', TeamController::class);
  //  Route::resource('players', PlayerController::class);



    Route::get('/cricket/index', [DashboardController::class, 'index'])->name('cricket.index');
    




//});
// Include Authentication Routes
require __DIR__.'/auth.php';
>>>>>>> c6bf595513fdc353330ce9f6966cc62c3ddc6881
