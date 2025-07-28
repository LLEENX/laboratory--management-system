@extends('layouts.app')

@section('title', 'Manajemen Inventaris')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2">Manajemen Inventaris</h1>
    <p class="mb-4">Daftar semua alat dan bahan yang tersedia di laboratorium.</p>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Alat Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Alat</th>
                            <th>Jumlah</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop data dari controller --}}
                        @foreach ($equipment as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['kode'] }}</td>
                                <td>{{ $item['nama'] }}</td>
                                <td>{{ $item['jumlah'] }}</td>
                                <td>{{ $item['lokasi'] }}</td>
                                <td>
                                    @if ($item['status'] == 'Tersedia')
                                        <span class="badge text-bg-success">{{ $item['status'] }}</span>
                                    @elseif ($item['status'] == 'Dipinjam')
                                        <span class="badge text-bg-warning">{{ $item['status'] }}</span>
                                    @else
                                        <span class="badge text-bg-danger">{{ $item['status'] }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash3-fill"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection