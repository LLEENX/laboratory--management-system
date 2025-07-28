@extends('layouts.app')

@section('title', 'Validasi Peminjaman')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Validasi Peminjaman Alat</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Daftar Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama Peminjam</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($borrowals as $borrowal)
                            <tr>
                                <td>{{ $borrowal->user->name }}</td>
                                <td>{{ $borrowal->equipment->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($borrowal->tanggal_pinjam)->format('d F Y') }}</td>
                                <td>
                                    @if ($borrowal->status == 'Disetujui')
                                        <span class="badge text-bg-success">{{ $borrowal->status }}</span>
                                    @elseif ($borrowal->status == 'Ditolak')
                                        <span class="badge text-bg-danger">{{ $borrowal->status }}</span>
                                    @else
                                        <span class="badge text-bg-warning">{{ $borrowal->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($borrowal->status == 'Menunggu Persetujuan')
                                    <form action="{{ route('admin.peminjaman.approve', $borrowal->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                                    </form>
        
                                    {{-- Form untuk Tolak bisa dibuat dengan pola yang sama --}}
                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                    </form>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection