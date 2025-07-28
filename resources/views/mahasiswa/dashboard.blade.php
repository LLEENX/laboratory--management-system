@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Dashboard Mahasiswa</h1>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>.</p>
    
    <div class="alert alert-info" role="alert">
        <i class="bi bi-info-circle-fill"></i>
        <strong>Praktikum Selanjutnya:</strong> Elektronika Dasar pada hari Rabu, 30 Juli 2025.
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Jadwal Praktikum Anda</h6>
                </div>
                <div class="card-body">
                    {{-- Contoh data --}}
                    <p><strong>Elektronika Dasar</strong> - Rabu, 10:00 - Ruang Lab 1</p>
                    <p><strong>Sistem Digital</strong> - Jumat, 13:00 - Ruang Lab 2</p>
                    <a href="#" class="btn btn-sm btn-primary">Lihat Jadwal Lengkap</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Alat yang Sedang Anda Pinjam</h6>
                </div>
                <div class="card-body">
                    {{-- Ganti dengan loop, atau tampilkan pesan jika tidak ada --}}
                    <p>Anda sedang meminjam <strong>1 Multimeter</strong>.</p>
                    <p class="small text-muted">Batas pengembalian: 29 Juli 2025</p>
                    <a href="#" class="btn btn-sm btn-primary">Lihat Riwayat Peminjaman</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection