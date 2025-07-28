@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Riwayat Peminjaman Alat</h1>
    <p class="mb-4">Berikut adalah riwayat peminjaman alat Anda.</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold text-primary">Riwayat Anda</h6>
            <a href="{{ route('mahasiswa.peminjaman.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Ajukan Peminjaman Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($borrowals as $borrowal)
                            <tr>
                                <td>{{ $borrowal->equipment->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($borrowal->tanggal_pinjam)->format('d F Y') }}</td>
                                <td>{{ $borrowal->tanggal_kembali ? \Carbon\Carbon::parse($borrowal->tanggal_kembali)->format('d F Y') : '-' }}</td>
                                <td>
                                    @if ($borrowal->status == 'Disetujui')
                                        <span class="badge text-bg-success">{{ $borrowal->status }}</span>
                                    @elseif ($borrowal->status == 'Ditolak')
                                        <span class="badge text-bg-danger">{{ $borrowal->status }}</span>
                                    @else
                                        <span class="badge text-bg-warning">{{ $borrowal->status }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Anda belum pernah melakukan peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection