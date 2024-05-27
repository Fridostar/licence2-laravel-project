<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RessetPasswordController;
use App\Http\Controllers\Gym\HomeController;
use App\Http\Controllers\Gym\SalleController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/gym/rooms', [SalleController::class, 'index'])->name('gym.room');

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.doLogin');

Route::get('/auth/register', [RegisterController::class, 'index'])->name('auth.register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('auth.doRegister');

Route::get('/auth/password-resset', [RessetPasswordController::class, 'index'])->name('auth.ressetPassword');
Route::post('/auth/password-resset', [RessetPasswordController::class, 'store'])->name('auth.doRessetPassword');
