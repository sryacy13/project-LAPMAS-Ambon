<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\PengaduanController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPengaduanController;
use App\Http\Controllers\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Awal
Route::get('/', function () {
    return view('welcome');
});

// Tentang Kami 
Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');

// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    // Pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('user.pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('user.pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('user.pengaduan.store');
    Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('user.pengaduan.edit');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('user.pengaduan.update');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('user.pengaduan.destroy');

    // Pengaduan Publik
    Route::get('/pengaduan/semua', [PengaduanController::class, 'showAll'])->name('user.pengaduan.all');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Manajemen Users
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Data Pengaduan
    Route::get('/admin/pengaduan', [AdminPengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::put('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'updateStatus'])->name('admin.pengaduan.update');

    // Laporan
    Route::get('/admin/laporan', function () {
        return view('admin.laporan.index');
    })->name('admin.laporan.index');
});

/*
|--------------------------------------------------------------------------
| PROFILE ROUTES (USER & ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| LOGOUT (Jika Tidak Menggunakan Breeze/Fortify)
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Auth scaffolding (login, register, dsb.)
require __DIR__ . '/auth.php';
