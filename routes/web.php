<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SettingController;
use Illuminate\Auth\Events\Login;

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/register', [HomeController::class, 'register'])->name('auth.register');
Route::post('/register', [LoginController::class, 'register']);

Route::get('/forgot-password', [HomeController::class, 'forgotPassword'])->name('auth.forgot-password');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::resource('devices', DeviceController::class);
Route::resource('{device}/settings', SettingController::class);
Route::resource('{device}/sensors', SensorController::class);
