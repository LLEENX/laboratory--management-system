<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowal;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowals = Borrowal::with(['user', 'equipment'])->latest()->get();

        return view('admin.peminjaman.index', compact('borrowals'));
    }

    
    public function approve(Borrowal $borrowal)
    {
        // Update status peminjaman menjadi 'Disetujui'
        $borrowal->update(['status' => 'Disetujui']);

        // Kembali ke halaman daftar peminjaman dengan pesan sukses
        return redirect()->route('admin.peminjaman.index')
                         ->with('success', 'Peminjaman berhasil disetujui.');
    }

}
