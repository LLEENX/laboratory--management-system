<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Storage;


class ModulController extends Controller
{
    public function index()
    {
        $modules = Module::latest()->get();
        return view('mahasiswa.modul.index', compact('modules'));
    }

    public function download(Module $module)
    {
        // Cek apakah file ada di storage
        if (Storage::disk('public')->exists($module->file_path)) {
            return Storage::download('path/to/' . $module);
        }

        // Jika file tidak ditemukan, kembali dengan error
        return redirect()->back()->with('error', 'File modul tidak ditemukan.');
    }

}
