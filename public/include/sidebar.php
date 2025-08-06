<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-cubes"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIDCP <sup>v1</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        ALMACEN
    </div>
    <!-- Nav Item - Tables -->    
    <li class="nav-item">
        <a class="nav-link" href="producto.php">
            <i class="fas fa-box-open"></i>
            <span>Productos</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        VENTAS
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="venta.php">
            <i class="fa-solid fa-store"></i>
            <span>Ventas</span>
        </a>
    </li>
     <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-dolly"></i>
            <span>Movimientos</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- SECCION PARA VENTAS -->
     <!-- Heading -->
    <div class="sidebar-heading">
        CAJA
    </div>
     
    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-cash-register"></i>
            <span>Registro de Caja</span>
        </a>
    </li>

    <!-- MENU EXCLUSIVO PARA ADMIN -->
    <?php if ($rol_id == 1): ?>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Administracion
    </div>
    <li class="nav-item">
        <a class="nav-link" href="empleados.php">
            <i class="fa-solid fa-id-card-clip"></i>
            <span>Empleados</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="usuarios.php">
            <i class="fa-solid fa-users"></i>
            <span>Usuarios</span>
        </a>
    </li>
    
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Ubicacion
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="sede.php">
            <i class="fa-solid fa-map-location-dot"></i>
            <span>Sedes</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Soporte
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="soporte.php">
            <i class="fa-solid fa-circle-question"></i>
            <span>Ayuda</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>