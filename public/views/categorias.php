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

    <?php include('../modal/modalNuevoCategoria.php'); ?>
    <?php include('../modal/modalEditarCategoria.php'); ?>

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
            <!-- Page title -->
            <div class="page-title mb-4">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i></a></li>
                  <li class="breadcrumb-item"><a href="producto.php">Productos</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                </ol>
              </nav>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalCrearCategoria"><i class="fa-solid fa-circle-plus text-white-50 mr-2"></i>Agregar Categoria</a>
            </div>
            <!-- End Page title -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Categorias</h6>
              </div>
              <div class="card-body">
                <div id="tablaCategoria"></div>
              </div>
            </div>
          </div>
        </div>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <!-- Footer -->
        <?php include('../include/footer.php'); ?>
        <!-- End of Footer -->
      </div>
      <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaCategoria').load('../componentes/tablaCategoria.php');
      });
    </script>
    <script type="text/javascript">
      function leerCategoria(idcateg){
        $.ajax({
          url: '../../public/procesos/categorias/leerCategoria.php',
          type: 'POST',

          data: "idcateg=" + idcateg,
          success:function(r){
            var datos= $.parseJSON(r);
            $('#idEditarCategoria').val(datos['idCategoria']);
            $('#nomEditarCategoria').val(datos['nomCategoria']);
            $('#descEditarCategoria').val(datos['descCategoria']);
          }
        })
        .done(function(r) {
          console.log(r);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      }


      function eliminaCategoria(idcateg){
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
              url: '../../public/procesos/categorias/eliminarCategoria.php',
              type: 'POST',
              data: "idcateg=" + idcateg,
              success:function(r){
                if (r==1) {
                  $('#tablaCategoria').load('../componentes/tablaCategoria.php');
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