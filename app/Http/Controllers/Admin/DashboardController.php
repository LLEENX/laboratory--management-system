<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowal;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data kalkulasi
        $totalAlat = Equipment::sum('jumlah');
        $permintaanBaru = Borrowal::where('status', 'Menunggu Persetujuan')->count();
        $alatDipinjam = Borrowal::where('status', 'Disetujui')->count();
        $totalPengguna = User::count();

        // Ambil 5 permintaan peminjaman terbaru yang masih tertunda
        $peminjamanTertunda = Borrowal::with(['user', 'equipment'])
                                      ->where('status', 'Menunggu Persetujuan')
                                      ->latest()
                                      ->take(5)
                                      ->get();

        // Kirim semua data ke view
        return view('admin.dashboard', compact(
            'totalAlat',
            'permintaanBaru',
            'alatDipinjam',
            'totalPengguna',
            'peminjamanTertunda'
        ));
    }
}