<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Asa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item  {{ request()->is('medicos*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('medicos.index') }}">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Médicos</span></a>
    </li>

    <li class="nav-item {{ request()->is('pacientes*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pacientes.index') }}">
            <i class="fas fa-fw fa-procedures"></i>
            <span>Pacientes</span></a>
    </li>

    <li class="nav-item {{ request()->is('atendimentos*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('atendimentos.index') }}">
            <i class="fas fa-fw fa-notes-medical"></i>
            <span>Atendimentos</span></a>
    </li>

    <li class="nav-item {{ request()->is('relatorios*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('relatorios.atendimentos.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Relatórios</span></a>
    </li>

    <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuários</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
