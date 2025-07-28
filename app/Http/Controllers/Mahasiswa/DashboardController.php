<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Borrowal;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jadwal praktikum selanjutnya (paling dekat dari hari ini)
        $jadwalBerikutnya = Schedule::where('tanggal', '>=', now()->toDateString())
                                      ->orderBy('tanggal', 'asc')
                                      ->orderBy('waktu_mulai', 'asc')
                                      ->first();

        // Ambil 2 jadwal terdekat untuk ditampilkan di card
        $jadwalTerdekat = Schedule::with('dosen')
                                  ->where('tanggal', '>=', now()->toDateString())
                                  ->orderBy('tanggal', 'asc')
                                  ->take(2)
                                  ->get();

        // Ambil data peminjaman yang masih aktif 
        $peminjamanAktif = Borrowal::with('equipment')
                                   ->where('user_id', Auth::id())
                                   ->where('status', 'Disetujui')
                                   ->get();

        return view('mahasiswa.dashboard', compact(
            'jadwalBerikutnya',
            'jadwalTerdekat',
            'peminjamanAktif'
        ));
    }
}
