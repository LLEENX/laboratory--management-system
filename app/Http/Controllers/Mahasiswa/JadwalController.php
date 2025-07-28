<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class JadwalController extends Controller
{
    public function index()
    {
        // Ambil semua data jadwal dari database, urutkan berdasarkan tanggal
        $schedules = Schedule::with('dosen')->orderBy('tanggal', 'asc')->get();

        return view('mahasiswa.jadwal.index', compact('schedules'));
    }
}
