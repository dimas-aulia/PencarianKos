<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminController;

// Halaman utama (Home) — Pencari Kos
Route::get('/', [KosController::class, 'index'])->name('home');

// Detail Kos — Harus login dulu
Route::get('/kos/{id}', [KosController::class, 'show'])->middleware('auth')->name('kos.detail');

// ===== Autentikasi =====
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== Owner Dashboard (Pemilik Kos) =====
Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::post('/owner/kos', [OwnerController::class, 'store'])->name('owner.kos.store');
    Route::get('/owner/kos/{id}/edit', [OwnerController::class, 'edit'])->name('owner.kos.edit');
    Route::put('/owner/kos/{id}', [OwnerController::class, 'update'])->name('owner.kos.update');
    Route::delete('/owner/kos/{id}', [OwnerController::class, 'destroy'])->name('owner.kos.destroy');
});

// ===== Admin Dashboard (Administrator) =====
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/kos/{id}/approve', [AdminController::class, 'approve'])->name('admin.kos.approve');
    Route::patch('/admin/kos/{id}/reject', [AdminController::class, 'reject'])->name('admin.kos.reject');
});