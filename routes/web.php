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
use App\Http\Controllers\Admin\LaporanPengaduanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

 profile_user
// Halaman Awal
=======
// ====================== HALAMAN UMUM ==========================
 main
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

 profile_user
    // Pengaduan

    // Pengaduan User
 main
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('user.pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('user.pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('user.pengaduan.store');
    Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('user.pengaduan.edit');
    Route::put('/pengaduan/{id}', [PengaduanController::class, 'update'])->name('user.pengaduan.update');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('user.pengaduan.destroy');

    // Pengaduan Publik
    Route::get('/pengaduan/semua', [PengaduanController::class, 'showAll'])->name('user.pengaduan.all');
});

 profile_user
/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
=======
// ====================== ADMIN ==========================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
 main

    // Manajemen Users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Data Pengaduan
 profile_user
    Route::get('/admin/pengaduan', [AdminPengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::put('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'updateStatus'])->name('admin.pengaduan.update');

    // Laporan
    Route::get('/admin/laporan', function () {

    Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{id}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
    Route::put('/pengaduan/{id}', [AdminPengaduanController::class, 'updateStatus'])->name('pengaduan.update');
    Route::delete('/pengaduan/{id}', [AdminPengaduanController::class, 'destroy'])->name('pengaduan.destroy');

    // Laporan Pengaduan
    Route::get('/laporan-pengaduan', [LaporanPengaduanController::class, 'index'])->name('laporan.pengaduan');
    Route::get('/laporan-pengaduan/export/pdf', [LaporanPengaduanController::class, 'exportPdf'])->name('laporan.pengaduan.pdf');
    Route::get('/laporan-pengaduan/export/excel', [LaporanPengaduanController::class, 'exportExcel'])->name('laporan.pengaduan.excel');

    // Placeholder laporan (opsional)
    Route::get('/laporan', function () {
main
        return view('admin.laporan.index');
    })->name('laporan.index');
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

profile_user
/*
|--------------------------------------------------------------------------
| LOGOUT (Jika Tidak Menggunakan Breeze/Fortify)
|--------------------------------------------------------------------------
*/
=======
// ====================== LOGOUT ==========================
main
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

profile_user
// Auth scaffolding (login, register, dsb.)
require __DIR__ . '/auth.php';
=======
// ====================== AUTH SCAFFOLDING ==========================
require __DIR__.'/auth.php';
main
