@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-75 small">Total Unit Alat</div>
                            {{-- Ganti dengan variabel dari controller --}}
                            <div class="h4 fw-bold">{{ $totalAlat }} Unit</div>
                        </div>
                        <i class="bi bi-tools fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-75 small">Permintaan Baru</div>
                             {{-- Ganti dengan variabel dari controller --}}
                            <div class="h4 fw-bold">{{ $permintaanBaru }}</div>
                        </div>
                        <i class="bi bi-bell-fill fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-75 small">Alat Dipinjam</div>
                             {{-- Ganti dengan variabel dari controller --}}
                            <div class="h4 fw-bold">{{ $alatDipinjam }} Transaksi</div>
                        </div>
                        <i class="bi bi-handbag-fill fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white bg-secondary shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-75 small">Pengguna Aktif</div>
                             {{-- Ganti dengan variabel dari controller --}}
                            <div class="h4 fw-bold">{{ $totalPengguna }}</div>
                        </div>
                        <i class="bi bi-people-fill fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Permintaan Peminjaman Tertunda</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Ganti dengan loop dari controller --}}
                        @forelse ($peminjamanTertunda as $peminjaman)
                            <tr>
                                <td>{{ $peminjaman->user->name }}</td>
                                <td>{{ $peminjaman->equipment->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d F Y') }}</td>
                                <td><a href="{{ route('admin.peminjaman.index') }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada permintaan peminjaman baru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection