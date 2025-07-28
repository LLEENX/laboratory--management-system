@extends('layouts.app')

@section('title', 'Unggah Modul Baru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Unggah Modul Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('dosen.modul.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Modul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Singkat (Opsional)</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="file_modul" class="form-label">Pilih File (PDF, DOC, DOCX)</label>
                    <input class="form-control" type="file" id="file_modul" name="file_modul" required>
                </div>

                <button type="submit" class="btn btn-primary">Unggah Modul</button>
                <a href="{{ route('dosen.modul.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection