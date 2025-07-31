<?php
  require '../../config/conexion.php';
  require '../include/auth.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("../include/head.php"); ?>
  </head>
  <body id="page-top">
    <div id="wrapper"><!-- Page Wrapper -->
      <?php include("../include/sidebar.php"); ?><!-- Sidebar -->
      <div id="content-wrapper" class="d-flex flex-column"><!-- Content Wrapper -->
        <!-- Main Content -->
        <div id="content">
          <?php include("../include/topbar.php"); ?>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="container-fluid">
            <div class="page-title mb-4">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i>Inicio</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Panel Principal</li>
                </ol>
              </nav>
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <header class="py-2">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-8">
                    <div class="p-2">
                      <div class="my-4 my-lg-5">
                        <h5 class="fw-bold text-primary">BIENVENIDO A SIDCP</h5>
                        <h1 class="display-5 fw-bold">SISTEMA DE CONTROL DE PRODUCTOS</h1>
                        <p class="fs-4">Todo lo que necesitas saber sobre tus productos y cada uno de sus detalles.</p>
                        <a href="producto.php" class="btn btn-primary">
                          <i class="fa-solid fa-list fa-sm text-white-50 mr-2"></i>Ver Productos
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </div>
            </header>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!-- Content Row -->
            <section class="py-2">
              <div class="container-fluid">
                <div class="row">
                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Correo
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              fcruzlau@gmail.com
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fa-solid fa-envelope fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Celular
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              +51 907 555 845
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fa-solid fa-mobile fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Earnings (Monthly)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              $40,000
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Earnings (Monthly)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              $40,000
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              </div>
            </section>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <?php include('../include/footer.php'); ?>
      </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!---****************************************************************************-->
    <?php include('../include/scripts.php'); ?>
      <!-- Page level plugins -->
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>
      <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/chart-area-demo.js"></script>
    <script src="../../assets/js/demo/chart-pie-demo.js"></script>
    <!---****************************************************************************-->
  </body>
</html>