@extends('layouts.app')

@section('title', 'Manajemen Modul')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Manajemen Modul Praktikum</h1>
    <p class="mb-4">Unggah, edit, atau hapus modul praktikum yang Anda ampu.</p>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('dosen.modul.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Unggah Modul Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Judul Modul</th>
                            <th>Deskripsi</th>
                            <th>Nama File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($modules as $modul)
                            <tr>
                                <td>{{ $modul->judul }}</td>
                                <td>{{ $modul->deskripsi ?? '-' }}</td>
                                <td>{{ basename($modul->file_path) }}</td>
                                <td>
                                    <a href="{{ route('dosen.modul.edit', $modul->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('dosen.modul.destroy', $modul->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus modul ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Anda belum mengunggah modul apapun.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection