<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

// Rutas para invitados (no autenticados)
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
    Route::get('/servicios/crear', [ServicioController::class, 'create'])->name('servicios.create');
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
