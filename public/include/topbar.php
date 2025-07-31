<nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow">

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item no-arrow mx-1">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user fa-fw"></i>
            </a>
        </li>

        <li class="nav-item no-arrow mx-1">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-message fa-fw"></i>
            </a>
        </li>

        <li class="nav-item no-arrow mx-1">
            <a href="soporte.php" class="nav-link">
                <i class="fa-solid fa-circle-question fa-fw"></i>
            </a>
        </li>

        <!-- Nav Item - Messages -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow pr-3">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold">
                <?php echo htmlspecialchars($usuario); ?>
                </span>
                <img class="img-profile rounded-circle" src="../../assets/img/registermen.png" width="32" height="32">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <h6 class="dropdown-header">
                    Sesión iniciada como:<br>
                    <strong><?php echo htmlspecialchars($nombreRol); ?></strong>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" id="btnlogout" role="button" onclick="salir()">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar sesión
                </a>
            </div>
        </li>
    </ul>
</nav>