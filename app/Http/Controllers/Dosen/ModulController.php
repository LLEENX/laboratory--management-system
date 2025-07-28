<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::where('user_id', Auth::id())->latest()->get();
        return view('dosen.modul.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.modul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_modul' => 'required|file|mimes:pdf,doc,docx|max:10240', // max 10MB
        ]);

        // Simpan file
        $path = $request->file('file_modul')->store('modul', 'public');

        Module::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
        ]);

        return redirect()->route('dosen.modul.index')->with('success', 'Modul berhasil diunggah.');
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
    public function edit(Module $modul)
    {
        // if ($module->user_id != Auth::id()) {
        //     abort(403, 'Akses Ditolak');
        // }
        return view('dosen.modul.edit', compact('modul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $modul)
    {
        if ($modul->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak');
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_modul' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // File bersifat opsional
        ]);

        $data = $request->only('judul', 'deskripsi');

        // Jika ada file baru yang diunggah
        if ($request->hasFile('file_modul')) {
            // Hapus file lama
            Storage::disk('public')->delete($modul->file_path);
            
            // Simpan file baru
            $path = $request->file('file_modul')->store('modul', 'public');
            $data['file_path'] = $path;
        }

        $modul->update($data);

        return redirect()->route('dosen.modul.index')->with('success', 'Modul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        if ($module->user_id != Auth::id()) {
            abort(403, 'Akses Ditolak');
        }
        // Hapus file dari storage
        Storage::disk('public')->delete($module->file_path);

        // Hapus data dari database
        $module->delete();

        return redirect()->route('dosen.modul.index')->with('success', 'Modul berhasil dihapus.');
    }
}
