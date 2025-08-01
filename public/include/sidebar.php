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
            <i class="fas fa-cube mr-2"></i>
            <span>Productos</span>
        </a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="categorias.php">
            <i class="fa-solid fa-dolly"></i>
            <span>Categorias</span>
        </a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- SECCION PARA VENTAS -->
     <!-- Heading -->
    <div class="sidebar-heading">
        Ventas
    </div>
     
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Caja</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Seccion Caja:</h6>
                <a class="collapse-item" href="buttons.html">Aperturar Caja</a>
                <a class="collapse-item" href="cards.html">Movimientos</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fa-solid fa-dolly"></i>
            <span>VENTA</span>
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
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="sede.php">
            <i class="fa-solid fa-map-location-dot"></i>
            <span>Sedes</span>
        </a>
    </li>
    <?php endif; ?>



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