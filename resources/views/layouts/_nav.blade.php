<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="profile-image">
            <img src="{{asset('template/images/faces/face5.jpg')}}" alt="image"/>
            </div>
            <div class="profile-name">
            <p class="name">
                Welcome Jane
            </p>
            <p class="designation">
                Super Admin
            </p>
            </div>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index-2.html">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categories.index')}}">
                <i class="fa fa-pallet menu-icon"></i>
                <span class="menu-title">Categorías</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fa fa-warehouse menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('products.index')}}">
                <i class="fa fa-boxes menu-icon"></i>
                <span class="menu-title">Productos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('clients.index')}}">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('purchases.index')}}">
                <i class="fa fa-money-check-alt menu-icon"></i>
                <span class="menu-title">Compras</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('sales.index')}}">
                <i class="fa fa-store-alt menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-configuracion" aria-expanded="false" aria-controls="page-layouts">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
        <div class="collapse" id="page-configuracion">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('business.index')}}">
                        <i class="fas fa-building menu-icon"></i>
                        <span class="menu-title">Empresa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('printers.index')}}">
                        <i class="fa fa-print menu-icon"></i>
                        <span class="menu-title">Impresora</span>
                    </a>
                </li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fa fa-users-cog menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-user-tag menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-reportes" aria-expanded="false" aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
        <div class="collapse" id="page-reportes">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reports.day')}}">
                        <i class="fas fa-clipboard-list menu-icon"></i>
                        <span class="menu-title">Reportes por Dia</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reports.date')}}">
                        <i class="fas fa-clipboard-list menu-icon"></i>
                        <span class="menu-title">Reportes por Fecha</span>
                    </a>
                </li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="pages/documentation.html">
            <i class="far fa-file-alt menu-icon"></i>
            <span class="menu-title">Documentation</span>
        </a>
        </li>
    </ul>
</nav>
