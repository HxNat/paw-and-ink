<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;

// Redireccion inicial al Login
Route::get('/', function () {
    return redirect()->route('login');
});

// --- AUTENTICACION (Login y Registro) ---
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- LOGIN SOCIAL (Laravel Socialite) ---
Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);

// --- RECUPERACION DE PASSWORD ---
Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showReset'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

// --- RUTA PROTEGIDA ---
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});