<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrowal;
use App\Models\Equipment;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowals = Borrowal::with('equipment')
                             ->where('user_id', Auth::id())
                             ->latest()
                             ->get();

        return view('mahasiswa.peminjaman.index', compact('borrowals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $equipments = Equipment::where('status', 'Tersedia')->where('jumlah', '>', 0)->get();
        return view('mahasiswa.peminjaman.create', compact('equipments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipment_id' => 'required|exists:equipments,id',
        ]);

        Borrowal::create([
            'user_id'        => Auth::id(),
            'equipment_id'   => $request->equipment_id,
            'tanggal_pinjam' => now(),
        ]);

        return redirect()->route('mahasiswa.peminjaman.index')
                         ->with('success', 'Permintaan peminjaman berhasil diajukan.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
