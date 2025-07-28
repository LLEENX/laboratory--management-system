<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipment = Equipment::latest()->get(); 

        // Kirim data ke view
        return view('admin.inventaris.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama'   => 'required|string|max:255',
            'kode'   => 'required|string|max:50|unique:equipments,kode',
            'jumlah' => 'required|integer|min:0',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        Equipment::create($request->all());

        return redirect()->route('admin.inventaris.index')
                         ->with('success', 'Alat baru berhasil ditambahkan!');


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
