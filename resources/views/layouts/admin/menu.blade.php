<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ Route('admin.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Route::currentRouteName() == 'admin.index' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span></a>
    </li>

    <hr class="sidebar-divider">
{{--
    <li class="nav-item {{ Route::currentRouteName() == 'admin.galeria' ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{ Route('admin.galeria') }}">
            <i class="fas fa-server"></i>
            <span>Galeria</span>
        </a>
    </li> --}}


    {{-- EXEMPLE --}}
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
            <i class="fas fa-server"></i>
            <span>EXEMPLO</span>
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-turbolinks="false" href="" data-toggle="collapse" data-target="#collapse"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>EXEMPLO DROPDOWN</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Escolha:</h6>
                <a class="collapse-item" href="#">Exemplo</a>
                <a class="collapse-item" href="#">Exemplo</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('usuarios.listar')
    <li class="nav-item {{ Route::currentRouteName() == 'admin.usuarios.index' ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{ route('admin.usuarios.index') }}">
            <i class="fas fa-users"></i>
            <span>Usuários do Sistema</span>
        </a>
    </li>
    @endcan

    @can('acl.ver')
    <li class="nav-item {{ Route::currentRouteName() == 'admin.acl.index' ? 'active' : ''}}">
        <a class="nav-link collapsed" href="{{ route('admin.acl.index') }}">
            <i class="fas fa-shield-alt"></i>
            <span>Permissões Do Sistema</span>
        </a>
    </li>
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
