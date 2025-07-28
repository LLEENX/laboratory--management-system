@extends('layouts.app')

@section('title', 'Pinjam Alat')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Form Peminjaman Alat</h1>
    <p class="mb-4">Pilih alat yang ingin Anda pinjam dari daftar di bawah ini.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Daftar Alat Tersedia</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Alat</th>
                            <th>Kode</th>
                            <th>Jumlah Tersedia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->nama }}</td>
                                <td>{{ $equipment->kode }}</td>
                                <td>{{ $equipment->jumlah }}</td>
                                <td>
                                    <form action="{{ route('mahasiswa.peminjaman.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
                                        <button type="submit" class="btn btn-sm btn-primary">Pinjam</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada alat yang tersedia saat ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection