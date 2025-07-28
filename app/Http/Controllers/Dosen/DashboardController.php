<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Models\Module;

class DashboardController extends Controller
{
    public function index()
    {
        // Jadwal terdekat
        $jadwalBerikutnya = Schedule::where('user_id', Auth::id())
                                      ->where('tanggal', '>=', now()->toDateString())
                                      ->orderBy('tanggal', 'asc')
                                      ->first();
        
        // Jumlah modul yang sudah diunggah
        $jumlahModul = Module::where('user_id', Auth::id())->count();

        return view('dosen.dashboard', compact('jadwalBerikutnya', 'jumlahModul'));
    }
}
