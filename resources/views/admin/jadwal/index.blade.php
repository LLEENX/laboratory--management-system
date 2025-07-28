@extends('layouts.app')

@section('title', 'Manajemen Jadwal')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Manajemen Jadwal Praktikum</h1>
    <p class="mb-4">Kelola semua jadwal praktikum yang akan berlangsung di laboratorium.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Jadwal Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Dosen Pengampu</th>
                            <th>Ruangan</th>
                            <th>Hari & Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $schedule)
                            <tr>
                                <td>
                                    {{ $schedule->mata_kuliah }}
                                    <span class="d-block small text-muted">Kelas: {{ $schedule->kelas }}</span>
                                </td>
                                <td>{{ $schedule->dosen->name }}</td>
                                <td>{{ $schedule->ruangan }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($schedule->tanggal)->isoFormat('dddd, D MMMM Y') }}
                                    <span class="d-block small text-muted">
                                        {{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.jadwal.edit', $schedule->id) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.jadwal.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus jadwal ini?')">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada jadwal yang dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection