@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Dashboard Mahasiswa</h1>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>.</p>
    
    {{-- Notifikasi Jadwal Berikutnya --}}
    @if ($jadwalBerikutnya)
        <div class="alert alert-info" role="alert">
            <i class="bi bi-info-circle-fill"></i>
            <strong>Praktikum Selanjutnya:</strong> 
            {{ $jadwalBerikutnya->mata_kuliah }} pada hari {{ \Carbon\Carbon::parse($jadwalBerikutnya->tanggal)->isoFormat('dddd, D MMMM Y') }}.
        </div>
    @else
        <div class="alert alert-secondary" role="alert">
            <i class="bi bi-info-circle-fill"></i>
            Tidak ada jadwal praktikum dalam waktu dekat.
        </div>
    @endif


    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Jadwal Praktikum Terdekat</h6>
                </div>
                <div class="card-body">
                    @forelse ($jadwalTerdekat as $jadwal)
                        <p>
                            <strong>{{ $jadwal->mata_kuliah }}</strong> - 
                            {{ \Carbon\Carbon::parse($jadwal->tanggal)->isoFormat('dddd, H:i') }} - 
                            {{ $jadwal->ruangan }}
                        </p>
                    @empty
                        <p>Belum ada jadwal yang dijadwalkan.</p>
                    @endforelse
                    <a href="{{ route('mahasiswa.jadwal.index') }}" class="btn btn-sm btn-primary mt-2">Lihat Jadwal Lengkap</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Alat yang Sedang Anda Pinjam</h6>
                </div>
                <div class="card-body">
                    @forelse ($peminjamanAktif as $peminjaman)
                        <p>Anda sedang meminjam <strong>{{ $peminjaman->equipment->nama }}</strong>.</p>
                        <p class="small text-muted">Diajukan pada: {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d F Y') }}</p>
                    @empty
                        <p>Anda tidak sedang meminjam alat apapun.</p>
                    @endforelse
                    <a href="{{ route('mahasiswa.peminjaman.index') }}" class="btn btn-sm btn-primary mt-2">Lihat Riwayat Peminjaman</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection