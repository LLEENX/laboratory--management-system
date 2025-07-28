<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('dosen')->latest()->get();

        return view('admin.jadwal.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua user yang memiliki peran 'dosen'
        $lecturers = User::where('role', 'dosen')->get();
        
        return view('admin.jadwal.create', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'mata_kuliah'   => 'required|string|max:255',
            'kelas'         => 'required|string|max:50',
            'user_id'       => 'required|exists:users,id',
            'ruangan'       => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'waktu_mulai'   => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Simpan data ke database
        Schedule::create($request->all());

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $jadwal)
    {
        // dd($schedule);


        $lecturers = User::where('role', 'dosen')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $jadwal)
    {
        // Validasi input
        $request->validate([
            'mata_kuliah'   => 'required|string|max:255',
            'kelas'         => 'required|string|max:50',
            'user_id'       => 'required|exists:users,id',
            'ruangan'       => 'required|string|max:255',
            'tanggal'       => 'required|date',
            'waktu_mulai'   => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Update data di database
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil dihapus.');
    }
}
