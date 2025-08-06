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

    <?php //include('../modal/modalNuevoProducto.php'); ?>
    <?php //include('../modal/modalEditarProducto.php'); ?>
    
    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <?php include("../include/sidebar.php"); ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->  
          <?php include("../include/topbar.php"); ?>
          <!-- End Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="page-title mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i></a></li>
                        <li class="breadcrumb-item"><a href="venta.php">Ventas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registro de Venta</li>
                    </ol>
                </nav>
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card border-top-info mb-2">
                        <div class="card-body">
                            <h6 class="m-0 font-weight-bold text-primary">Registrar Venta</h6>
                            <form action="">
                                <div class="form-row">
                                    <div class="form-group col-sm-8">
                                        <label for="clienteVenta" class="col-form-label col-form-label-sm">Cliente</label>
                                        <input type="text" class="form-control form-control-sm" id="clienteVenta" name="">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="clienteVenta" class="col-form-label col-form-label-sm">Tipo Venta</label>
                                        <input type="text" class="form-control form-control-sm" id="clienteVenta" name="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <label for="clienteVenta" class="col-form-label col-form-label-sm">Abono</label>
                                        <input type="text" class="form-control form-control-sm" id="clienteVenta" name="">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="clienteVenta" class="col-form-label col-form-label-sm">Saldo</label>
                                        <input type="text" class="form-control form-control-sm" id="clienteVenta" name="" Readonly>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="clienteVenta" class="col-form-label col-form-label-sm">Tipo Pago</label>
                                        <input type="text" class="form-control form-control-sm" id="clienteVenta" name="">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card border-left-info mb-2">
                        <div class="card-body">
                            <div class="" style="height: 100px"></div>
                        </div>
                    </div>
                    <div class="card border-left-success mb-2">
                        <div class="card-body"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card border-top-warning">
                        <div class="card-body">
                            <h6 class="m-0 font-weight-bold text-primary mb-4">Buscar Producto</h6>
                            <div id="tablaBuscarProd"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          </div>
        </div>
        
        <!-- Footer -->
        <?php include('../include/footer.php'); ?>
        <!-- End of Footer -->
      </div>
      <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaBuscarProd').load('../componentes/tablaProductoVenta.php');
      });
    </script>
   
  </body>
</html>