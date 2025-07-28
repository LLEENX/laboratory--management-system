@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Jadwal Mengajar Anda</h1>
    <p class="mb-4">Berikut adalah daftar jadwal praktikum yang Anda ampu.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Daftar Jadwal</h6>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Anda belum memiliki jadwal mengajar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection