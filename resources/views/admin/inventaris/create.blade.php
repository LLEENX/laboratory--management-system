@extends('layouts.app')

@section('title', 'Tambah Alat Baru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Tambah Alat Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.inventaris.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Alat</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Alat</label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required min="1">
                </div>
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi Penyimpanan</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Tersedia" selected>Tersedia</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Dipinjam">Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.inventaris.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection