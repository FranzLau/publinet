<?php
  require '../../config/conexion.php';
  require '../include/auth.php';
  soloAdmin();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include('../include/head.php'); ?>
  </head>
  <body id="page-top">

    <!-- modal para agregar -->
    <?php include('../modal/modalNuevoCargo.php'); ?>
    <!-- modal para editar -->
    <?php include('../modal/modalEditarCargo.php'); ?>

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
            <!-- Page title -->
            <div class="page-title mb-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i></a></li>
                  <li class="breadcrumb-item"><a href="empleados.php">Empleados</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cargos</li>
                </ol>
              </nav>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalCrearCargo"><i class="fa-solid fa-circle-plus text-white-50 mr-2"></i>Agregar Cargo</a>

            </div>
            <!-- End Page title -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Cargos</h6>
              </div>
              <div class="card-body">
                <div id="tabCargo"></div>
              </div>
            </div>
          </div>
        </div>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <!-- Footer -->
        <!-- Footer -->
        <?php include('../include/footer.php'); ?>
        <!-- End of Footer -->
        <!-- End of Footer -->
      </div>
      <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tabCargo').load('../componentes/tablaCargo.php');
        $('#tabArea').load('../componentes/tablaArea.php');
        $('#tabGerencia').load('../componentes/tablaGerencia.php');
      });
    </script>
    
    <script type="text/javascript">
      //------- Funciones para CARGO -------------------------
      function leerCargo(id_cargo){
        $.ajax({
          url: '../../public/procesos/cargo/leerCargo.php',
          type: 'POST',
          data: "idcargo=" + id_cargo,
          success:function(r){
            var datos= $.parseJSON(r);
            $('#idEdCargo').val(datos['idCargo']);
            $('#nomEdCargo').val(datos['nomCargo']);
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      }

      function eliminarCargo(id_cargo){
        console.log("no llega modal");
        Swal.fire({
          title: 'Estas seguro?',
          text: "No podrás revertir esta acción!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          console.log("llega modal");
          if (result.isConfirmed) {
            $.ajax({
              url: '../../public/procesos/cargo/eliminarCargo.php',
              type: 'POST',
              data: "idcarg=" + id_cargo,
              success:function(r){
                if (r==1) {
                  
                  $('#tabCargo').load('../componentes/tablaCargo.php');
                  Swal.fire(
                    'Eliminado!',
                    'Su archivo ha sido eliminado.',
                    'success'
                    )
                }else{
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error!'
                    })
                }
              }
            })    
          }
        })
      }
    </script>
    
  </body>
</html>