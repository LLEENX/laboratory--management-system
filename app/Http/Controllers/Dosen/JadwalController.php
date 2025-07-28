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
        $schedules = Schedule::where('user_id', Auth::id())->orderBy('tanggal', 'asc')->get();
        return view('dosen.jadwal.index', compact('schedules'));
    }

    public function create()
    {
        return view('dosen.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah'   => 'required|string|max:255',
            'kelas'         => 'required|string|max:50',
            'ruangan'       => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'waktu_mulai'   => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Tambahkan user_id dari dosen yang sedang login
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Schedule::create($data);

        return redirect()->route('dosen.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $jadwal)
    {
        // Pastikan dosen hanya bisa mengedit jadwalnya sendiri
        if ($jadwal->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak');
        }
        return view('dosen.jadwal.edit', compact('jadwal'));
    }

     public function update(Request $request, Schedule $jadwal)
    {
        // Pastikan dosen hanya bisa mengupdate jadwalnya sendiri
        if ($jadwal->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak');
        }

        $request->validate([
            'mata_kuliah'   => 'required|string|max:255',
            'kelas'         => 'required|string|max:50',
            'ruangan'       => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'waktu_mulai'   => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('dosen.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $jadwal)
    {
        // Pastikan dosen hanya bisa menghapus jadwalnya sendiri
        if ($jadwal->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak');
        }
        
        $jadwal->delete();

        return redirect()->route('dosen.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

}
