<?php
  require '../../config/conexion.php';
  require '../include/auth.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include('../include/head.php'); ?>
  </head>
  <body id="page-top">

    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    
    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php include("../include/sidebar.php"); ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <?php include("../include/topbar.php"); ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="page-title mb-4">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Panel de Soporte</li>
                </ol>
              </nav>
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <header class="py-2">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="p-2">
                      <div class="my-4 my-lg-5">
                        <h5 class="fw-bold text-primary">¿NECESITAS AYUDA?</h5>
                        <h1 class="display-5 fw-bold">Estas en el lugar correcto</h1>
                        <p class="fs-4">Todo lo que necesitas saber sobre los posibles problemas que se encuentre al momento de usar el sistema.</p>
                        <a href="#" class="btn btn-success">
                          <i class="fa-solid fa-comments fa-sm text-white-50 mr-2"></i>Contactar a Soporte
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6"></div>
                </div>
              </div>
            </header>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
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
        
            
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <!-- Footer -->
        <?php include('../include/footer.php'); ?>
        <!-- End of Footer -->
      </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaSoporte').load('../componentes/tablaSoporte.php');
      });
    </script>
  </body>
</html>