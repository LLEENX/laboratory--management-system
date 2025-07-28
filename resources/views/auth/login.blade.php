{{-- @extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px; border-radius: 1rem;">
        <h4 class="text-center mb-4">Login Akun</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Masuk</button>
            </div>

            <div class="text-center">
                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></small>
            </div>
        </form>
    </div>
</div>
@endsection --}}



{{-- Gunakan layout GUEST, bukan APP --}}
@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<style>
    /* Latar belakang halaman */
    body {
        background: #f0f2f5; /* Warna latar yang lembut */
        display: grid; /* Menggunakan Grid untuk menengahkan secara sempurna */
        place-items: center; /* Menempatkan item di tengah (vertikal & horizontal) */
        height: 100vh;
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    /* Kotak login utama */
    .login-container {
        padding: 40px 30px;
        max-width: 400px;
        width: 100%;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    /* Ikon dan Judul */
    .login-header .icon {
        font-size: 48px;
        color: #0d6efd; /* Warna biru primary bootstrap */
        margin-bottom: 1rem;
    }
    .login-header h1 {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }
    .login-header p {
        color: #6c757d; /* Warna teks sekunder bootstrap */
        margin-bottom: 2rem;
    }

    /* Form */
    .form-floating label {
        color: #6c757d;
    }
    .form-control:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .btn-primary {
        padding: 12px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        margin-top: 1rem;
    }
</style>

<div class="login-container">
    <div class="login-header">
        <div class="icon">
            <i class="bi bi-box-seam"></i>
        </div>
        <h1>LabSistem</h1>
        <p>Silakan login untuk melanjutkan</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger text-start py-2">
            Login Gagal. Periksa kembali email dan password Anda.
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" placeholder="NIM / Email" required value="{{ old('nomor_induk') }}">
            <label for="nomor_induk">Nomor Induk / Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-primary" type="submit">Login</button>
    </form>
</div>
@endsection