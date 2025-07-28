<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Dosen;
use App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route Login

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');


// Route Register

Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');


// Route Home

Route::get('/', [HomeController::class, 'index']);


// Route Admin

Route::middleware(['auth', 'is.admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/inventaris', Admin\InventarisController::class);
    Route::resource('/jadwal', Admin\JadwalController::class);

    Route::get('/peminjaman', [Admin\PeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::post('/peminjaman/{borrowal}/approve', [Admin\PeminjamanController::class, 'approve'])->name('admin.peminjaman.approve');
    
    // Tambahkan rute admin lainnya di sini
});


// Route Dosen

Route::middleware(['auth', 'is.dosen'])->prefix('dosen')->group(function () {
    Route::get('/dashboard', [Dosen\DashboardController::class, 'index'])->name('dosen.dashboard');
    Route::resource('/modul', Dosen\ModulController::class);
    
    // Tambahkan rute dosen lainnya di sini
});


// Route Mahasiswa

Route::middleware(['auth', 'is.mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [Mahasiswa\DashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/jadwal', [Mahasiswa\JadwalController::class, 'index'])->name('mahasiswa.jadwal');
    Route::resource('/peminjaman', Mahasiswa\PeminjamanController::class)->only(['index', 'create', 'store', 'show']);
    
    // Tambahkan rute mahasiswa lainnya di sini
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});