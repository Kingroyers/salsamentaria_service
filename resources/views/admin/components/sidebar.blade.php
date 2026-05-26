<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-label">Sistema POS</div>
        <div class="brand-name">Salsamentaria</div>
        <div class="brand-role">ADMINISTRADOR</div>
    </div>

    <nav class="nav-scroll">
        <div class="nav-group">Principal</div>
        <a class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon_home.png') }}" alt="Logo"></span> Home
        </a>

        <a class="nav-item {{ request()->routeIs('admin.ventas') ? 'active' : '' }}" href="{{ route('admin.ventas') }}">
            <span class="nav-icon">
                <img src="{{ asset('img/icon-ventas.png') }}" alt="">
            </span> Ventas </a>

        <a class="nav-item {{ request()->routeIs('admin.reportes') ? 'active' : '' }}" href="{{ route('admin.reportes') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon-report.png')}}" alt=""></span> Reportes
        </a>


        <div class="nav-group">Inventario</div>
        <a class="nav-item {{ request()->routeIs('admin.productos') ? 'active' : '' }}" href="{{ route('admin.productos') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon-product.png') }}" alt=""></span> Productos
        </a>
        <a class="nav-item {{ request()->routeIs('admin.categorias') ? 'active' : '' }}" href="{{ route('admin.categorias') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon_categoria.png') }}" alt=""></span> Categorías
        </a>
        <a class="nav-item {{ request()->routeIs('admin.stock_bajos') ? 'active' : '' }}" href="{{ route('admin.stock_bajos') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon_stockb.png') }}" alt=""></span> Stock bajo
            <span class="nav-badge">3</span>
        </a>

        <div class="nav-group">Gestión</div>
        <a class="nav-item {{ request()->routeIs('admin.usuarios') ? 'active' : '' }}" href="{{ route('admin.usuarios') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon_user.png') }}" alt=""></span> Usuarios
        </a>
        <a class="nav-item {{ request()->routeIs('admin.facturas') ? 'active' : '' }}" href="{{ route('admin.facturas') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon_factura.png') }}" alt=""></span> Facturas
        </a>

        <div class="nav-group">Sistema</div>
        <a class="nav-item {{ request()->routeIs('admin.configuracion') ? 'active' : '' }}" href="{{ route('admin.configuracion') }}">
            <span class="nav-icon"><img src="{{ asset('img/icon_config.png') }}" alt=""></span> Configuración
        </a>
    </nav>

    <div class="sidebar-footer">
        <div class="user-row">
            <div class="user-avatar">CA</div>
            <div class="user-info">
                <div class="user-name">Carlos Admin</div>
                <div class="user-email">admin@salsa.co</div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" title="Cerrar sesión" class="logout-btn">
                    ⏻
                </button>
            </form>

        </div>
    </div>
</aside>