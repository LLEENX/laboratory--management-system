@extends('layouts.app')

@section('title', 'Tambah Jadwal Baru')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Tambah Jadwal Praktikum Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.jadwal.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mata_kuliah" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="user_id" class="form-label">Dosen Pengampu</label>
                        <select class="form-select" id="user_id" name="user_id" required>
                            <option selected disabled value="">Pilih Dosen...</option>
                            @foreach ($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ruangan" class="form-label">Ruang Lab</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection