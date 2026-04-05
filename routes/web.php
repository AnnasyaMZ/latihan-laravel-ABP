<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// ==========================================
// RUTE UNTUK TUGAS MINGGU 12 (Sistem Auth)
// ==========================================

// Rute untuk Login
Route::get('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/auth', [AuthController::class, 'auth']); 

// Rute untuk Registrasi
Route::get('/registration', [AuthController::class, 'registration']); 
Route::post('/register', [AuthController::class, 'register']); 

// Rute Home & Logout
Route::get('/home', [AuthController::class, 'home'])->name('home'); 
Route::get('/logout', [AuthController::class, 'logout']); 


// ==========================================
// RUTE TAMBAHAN (Lat1Controller)
// ==========================================

Route::get('/lat1', 'App\Http\Controllers\Lat1Controller@index');
Route::get('/lat1/m2', 'App\Http\Controllers\Lat1Controller@method2');