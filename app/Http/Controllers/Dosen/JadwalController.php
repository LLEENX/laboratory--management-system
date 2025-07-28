<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class JadwalController extends Controller
{
    public function index()
    {
        // Ambil jadwal yang user_id nya sama dengan id dosen yang login
        $schedules = Schedule::where('user_id', Auth::id())->orderBy('tanggal', 'asc')->get();
        
        return view('dosen.jadwal.index', compact('schedules'));
    }
}
