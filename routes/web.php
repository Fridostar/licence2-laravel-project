<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RessetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\ManagerController;
use App\Http\Controllers\Backoffice\PricingController;
use App\Http\Controllers\Gym\RoomController;
use App\Http\Controllers\Gym\WelcomeController;
use Illuminate\Support\Facades\Route;

// authentication routes
Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('auth.doRegister');

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.doLogin');

// Email verification
Route::get('email/verify/{id}', [VerifyEmailController::class, 'verify'])->name('verification.verify');
Route::get('email/resend/{id}', [VerifyEmailController::class, 'resend'])->name('verification.resend');

Route::get('/auth/password-resset', [RessetPasswordController::class, 'index'])->name('auth.ressetPassword');
Route::post('/auth/password-resset', [RessetPasswordController::class, 'store'])->name('auth.doRessetPassword');

// gym
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/gym/rooms/map', [RoomController::class, 'showMap'])->name('gym.rooms.map');
Route::get('/gym/rooms-{id}/overview', [RoomController::class, 'search'])->name('gym.rooms.overview');
Route::get('/gym/rooms/subscription', [RoomController::class, 'subscription'])->name('gym.rooms.subscription');

// protected routes
Route::middleware(['auth',])->group(function () {
    Route::post('/auth/logout', [LoginController::class, 'destroy'])->name('auth.logout');

    // actions that only user-role can do
    Route::middleware(['user'])->group(function () {
        //
    });

    // actions that only manager-role can do
    Route::middleware(['manager',])->group(function () {
        Route::get('/backoffice/manager/home', [ManagerController::class, 'home'])->name('manager.home');

        Route::get('/backoffice/manager/pricing', [PricingController::class, 'index'])->name('manager.pricing.index');
        Route::post('/backoffice/manager/pricing', [PricingController::class, 'store'])->name('manager.pricing.store');
        Route::get('/backoffice/manager/pricing/{id}', [PricingController::class, 'show'])->name('manager.pricing.show');
        Route::put('/backoffice/manager/pricing/{id}', [PricingController::class, 'update'])->name('manager.pricing.update');
        Route::delete('/backoffice/manager/pricing/{id}', [PricingController::class, 'destroy'])->name('manager.pricing.destroy');
    });
    
    // actions that only admin-role can do
    Route::middleware(['admin',])->group(function () {
        // 
    });
    
    // actions that only admin and manager can do
    Route::middleware(['admin', 'manager'])->group(function () {
        //
    });

    Route::get('/backoffice', [DashboardController::class, 'index'])->name('dashboard.home');
});
