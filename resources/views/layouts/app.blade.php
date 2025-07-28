<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Lab')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="d-flex">
        @auth
            <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh;">
                <a href="/" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                    <i class="bi bi-box-seam fs-4 me-2"></i>
                    <span class="fs-4">LabSistem</span>
                </a>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    {{-- Navigasi Dinamis Sesuai Peran --}}
                    @if(Auth::user()->role == 'admin')
                        @include('layouts.partials.nav-admin')
                    @elseif(Auth::user()->role == 'dosen')
                        @include('layouts.partials.nav-dosen')
                    @elseif(Auth::user()->role == 'mahasiswa')
                        @include('layouts.partials.nav-mahasiswa')
                    @endif
                </ul>
            </div>
        @endauth
        <main class="w-100 p-4">
            @yield('content')
        </main>
    </div>
</body>
</html>