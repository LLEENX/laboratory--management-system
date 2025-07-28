@extends('layouts.app')

@section('title', 'Edit Modul')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Edit Modul</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('dosen.modul.update', $modul->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Modul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $modul->judul }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Singkat (Opsional)</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ $modul->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="file_modul" class="form-label">Unggah File Baru (Opsional)</label>
                    <p class="small text-muted">File saat ini: {{ basename($modul->file_path) }}. Biarkan kosong jika tidak ingin mengubah file.</p>
                    <input class="form-control" type="file" id="file_modul" name="file_modul">
                </div>

                <button type="submit" class="btn btn-primary">Update Modul</button>
                <a href="{{ route('dosen.modul.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection