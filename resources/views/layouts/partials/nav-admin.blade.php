<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
</li>
<li>
    <a href="{{ route('admin.inventaris.index') }}" class="nav-link text-white">
        <i class="bi bi-tools me-2"></i> Manajemen Inventaris
    </a>
</li>
<li>
    <a href="{{ route('admin.peminjaman.index') }}" class="nav-link text-white">
        <i class="bi bi-card-checklist me-2"></i> Validasi Peminjaman
    </a>
</li>
 <li>
    <a href="{{ route('admin.jadwal.index') }}" class="nav-link text-white">
        <i class="bi bi-calendar-week me-2"></i> Manajemen Jadwal
    </a>
</li>
<li>
    <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
        <i class="bi bi-people-fill me-2"></i> Manajemen Pengguna
    </a>
</li>