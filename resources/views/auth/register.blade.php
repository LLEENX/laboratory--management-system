@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="register-header">
                        <div class="icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h2 class="text-center mb-4">Registrasi</h3>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name') }}"  placeholder="" required autofocus>
                            <label for="name">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nomor_induk" name="nomor_induk"
                                   value="{{ old('nomor_induk') }}" placeholder="" required>
                            <label for="nomor_induk">Nomor Induk (NIM/NIDN)</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email') }}" placeholder="" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" required>
                            <label for="password_confirmation">Konfirmasi Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="role" name="role" placeholder="" required>
                                <option value="" disabled selected>Anda Sebagai</option>
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                            </select>
                            <label for="role">Role</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                    </form>

                    <div class="text-center mt-3">
                        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection