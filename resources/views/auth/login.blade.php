@extends('layouts.guest')

@section('title', 'Login')

@section('content')

@if(session('success'))
    <div class="alert alert-success" id="flash-success">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            const flash = document.getElementById('flash-success');
            if (flash) {
                flash.style.display = 'none';
            }
        }, 3000); // 3 detik
    </script>
@endif

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
            Login gagal. Nomor Induk atau Password salah.
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

        <div class="text-center mt-3">
            Belum punya akun? <a href="{{ route('register') }}">Registrasi di sini</a>
        </div>
    </form>
</div>
@endsection