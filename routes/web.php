<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InventarisController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\JadwalController as MahasiswaJadwalController;
use App\Http\Controllers\Mahasiswa\PeminjamanController as MahasiswaPeminjamanController;
use App\Http\Controllers\Mahasiswa\ModulController as MahasiswaModulController;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Dosen\JadwalController as DosenJadwalController;
use App\Http\Controllers\Dosen\ModulController as DosenModulController;
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


// Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route Admin

Route::middleware(['auth', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/inventaris', InventarisController::class);
    Route::resource('/users', PenggunaController::class);
    Route::resource('/jadwal', JadwalController::class);
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::post('/peminjaman/{borrowal}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    
    // Tambahkan rute admin lainnya di sini
});


// Route Dosen

Route::middleware(['auth', 'is.dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/dashboard', [DosenDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/jadwal', [DosenJadwalController::class, 'index'])->name('jadwal.index');
    
    Route::resource('/modul', DosenModulController::class);
    
});


// Route Mahasiswa

Route::middleware(['auth', 'is.mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/jadwal', [MahasiswaJadwalController::class, 'index'])->name('jadwal.index');

    Route::resource('/peminjaman', MahasiswaPeminjamanController::class)->only(['index', 'create', 'store']);
    
    Route::get('/modul', [MahasiswaModulController::class, 'index'])->name('modul.index');
    Route::get('/modul/{module}/download', [MahasiswaModulController::class, 'download'])->name('modul.download');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});