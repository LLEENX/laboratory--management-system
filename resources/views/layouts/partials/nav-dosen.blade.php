<li class="nav-item">
    <a href="{{ route('dosen.dashboard') }}" class="nav-link text-white {{ request()->routeIs('dosen.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
</li>
<li>
    <a href="{{ route('dosen.jadwal.index') }}" class="nav-link text-white">
        <i class="bi bi-calendar-week me-2"></i> Jadwal Mengajar
    </a>
</li>
<li>
    <a href="{{ route('dosen.modul.index') }}" class="nav-link text-white">
        <i class="bi bi-file-earmark-arrow-up-fill me-2"></i> Manajemen Modul
    </a>
</li>