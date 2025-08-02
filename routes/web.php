<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\PengaduanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Tentang Kami 
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

// Untuk User
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Pengaduan Routes
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('user.pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('user.pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('user.pengaduan.store');
    
    // Edit & Hapus Pengaduan
    Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('user.pengaduan.edit');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('user.pengaduan.update');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('user.pengaduan.destroy');
});

// Untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tampilkan semua pengaduan untuk publik/user
Route::get('/pengaduan/semua', [PengaduanController::class, 'showAll'])->name('user.pengaduan.all');

require __DIR__.'/auth.php';
