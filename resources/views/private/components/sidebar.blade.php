<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">My PDDIKTI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage
    </div>

    <!-- Nav Item - User Management (Admin Only) -->
    @if(auth()->user()->isAdmin())
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fa-solid fa-users"></i>
            <span>User</span></a>
    </li>
    @endif

    <!-- Nav Item - Dosen Management (Admin Only) -->
    @if(auth()->user()->isAdmin())
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dosen.index') }}">
            <i class="fa-solid fa-chalkboard-user"></i>
            <span>Dosen</span></a>
    </li>
    @endif

    <!-- Nav Item - Mahasiswa Management (Admin & Staff) -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('mahasiswa.index') }}">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Mahasiswa</span></a>
    </li>

    <!-- Nav Item - Kampus Management (Admin & Staff) -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kampus.index') }}">
            <i class="fa-solid fa-school"></i>
            <span>Kampus</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>