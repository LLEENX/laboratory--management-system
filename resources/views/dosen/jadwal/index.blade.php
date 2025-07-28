@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Jadwal Mengajar Anda</h1>
    <p class="mb-4">Berikut adalah daftar jadwal praktikum yang Anda ampu.</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- Tambah Tombol Create --}}
            <a href="{{ route('dosen.jadwal.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Buat Jadwal Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Kelas</th>
                            <th>Ruangan</th>
                            <th>Hari & Waktu</th>
                            <th>Aksi</th> {{-- Tambah Kolom Aksi --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->mata_kuliah }}</td>
                                <td>{{ $schedule->kelas }}</td>
                                <td>{{ $schedule->ruangan }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($schedule->tanggal)->isoFormat('dddd, D MMMM Y') }}
                                    <span class="d-block small text-muted">
                                        {{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('dosen.jadwal.edit', $schedule->id) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('dosen.jadwal.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Anda belum memiliki jadwal mengajar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection