@extends('layouts.app')

@section('title', 'Dashboard Dosen')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Dashboard Dosen</h1>
    <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>.</p>
    
    @if ($jadwalBerikutnya)
        <div class="alert alert-info" role="alert">
            <i class="bi bi-info-circle-fill"></i>
            <strong>Jadwal Mengajar Selanjutnya:</strong> 
            {{ $jadwalBerikutnya->mata_kuliah }} pada hari {{ \Carbon\Carbon::parse($jadwalBerikutnya->tanggal)->isoFormat('dddd, D MMMM Y') }}.
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card text-bg-success shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="small">Total Jadwal Mengajar</div>
                            <div class="h4 fw-bold">...</div> {{-- Perlu query tambahan jika ingin menampilkan total --}}
                        </div>
                        <i class="bi bi-calendar-week fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card text-bg-danger shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="small">Modul Diunggah</div>
                            <div class="h4 fw-bold">{{ $jumlahModul }} Modul</div>
                        </div>
                        <i class="bi bi-file-earmark-arrow-up-fill fs-1 opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection