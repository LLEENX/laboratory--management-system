@extends('layouts.app')

@section('title', 'Download Modul')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Download Modul Praktikum</h1>
    <p class="mb-4">Berikut adalah daftar modul yang tersedia untuk diunduh.</p>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Daftar Modul</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @forelse ($modules as $module)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">{{ $module->judul }}</div>
                            <div class="small text-muted">{{ $module->deskripsi }}</div>
                        </div>
                        <a href="{{ route('mahasiswa.modul.download', $module->id) }}" class="btn btn-sm btn-success">
                            <i class="bi bi-download"></i> Download
                        </a>
                    </li>
                @empty
                    <li class="list-group-item text-center">Belum ada modul yang diunggah.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection