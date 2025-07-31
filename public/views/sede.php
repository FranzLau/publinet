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

    <!-- modal para sede nueva -->
    <?php include('../modal/modalNuevoSede.php'); ?>
    <?php include('../modal/modalEditarSede.php'); ?>

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
            <div class="page-title mb-4">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Sedes</li>
                </ol>
              </nav>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalCrearSede"><i class="fa-solid fa-circle-plus text-white-50 mr-2"></i>Agregar Sede</a>
            </div>
            <!-- End Page title -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Sedes</h6>
              </div>
              <div class="card-body">
                <div id="tablaSede"></div>
              </div>
            </div>
            <!-- Page end body -->
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
        $('#tablaSede').load('../componentes/tablaSede.php');
      });
    </script>
    
    <script type="text/javascript">
    
      //------- Funciones para Sedes -------------------------
      function leerSede(idsede){
        $.ajax({
          url: '../../public/procesos/sedes/leerSede.php',
          type: 'POST',
          data: "idsede=" + idsede,
          success:function(r){
            var datos= $.parseJSON(r);
            $('#idEditarSede').val(datos['idSede']);
            $('#nomEditarSede').val(datos['nomSede']);
            $('#ciudadEditarSede').val(datos['ciudadSede']);
            $('#dirEditarSede').val(datos['direccionSede']);
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

      function eliminarSede(idsede){
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
              url: '../../public/procesos/sedes/eliminarSede.php',
              type: 'POST',
              data: "idsede=" + idsede,
              success:function(r){
                if (r==1) {
                  $('#tablaSede').load('../componentes/tablaSede.php');
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