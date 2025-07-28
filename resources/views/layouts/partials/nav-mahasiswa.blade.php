{{-- MENU UNTUK MAHASISWA --}}
<li class="nav-item">
    <a href="{{ route('mahasiswa.dashboard') }}" class="nav-link text-white {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
</li>
<li>
    <a href="{{ route('mahasiswa.jadwal.index') }}" class="nav-link text-white">
        <i class="bi bi-calendar3 me-2"></i> Lihat Jadwal
    </a>
</li>
<li>
    <a href="{{ route('mahasiswa.peminjaman.index') }}" class="nav-link text-white">
        <i class="bi bi-handbag me-2"></i> Peminjaman Alat
    </a>
</li>
<li>
    <a href="#" class="nav-link text-white">
        <i class="bi bi-cloud-arrow-down me-2"></i> Download Modul
    </a>
</li>