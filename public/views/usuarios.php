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
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../modal/modalNuevoUsuario.php'); ?>
    <?php include('../modal/modalEditarUsuario.php'); ?>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
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
                  <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
              </nav>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalNuevoUser"><i class="fa-solid fa-circle-plus mr-2 text-white-50"></i>Agregar Usuario</a>
            </div>
            <!-- End Page title -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
              </div>
              <div class="card-body">
                <div id="tablaUsuarios"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <?php include('../include/footer.php'); ?>
        <!-- End of Footer -->
      </div>
    </div>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->

    <?php include('../include/scripts.php'); ?>
    
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaUsuarios').load('../componentes/tablaUsuarios.php');
      });
    </script>
    
    <script type="text/javascript">
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
      function verDatosUsuario(idUsuario){
        $.ajax({
          url: '../../public/procesos/usuario/leerUsuario.php',
          type: 'POST',
          data: "iduser=" + idUsuario,
          success:function(r){
            var datos= $.parseJSON(r);
            $('#idEditarUser').val(datos['idUsuario']);
            $('#rolEditUser').val(datos['idRol']);
            $('#empEditUser').val(datos['idEmp']);
            $('#nomEditUser').val(datos['nomUsuario']);
            $('#estadoEditUser').val(datos['estUsuario']);
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
      //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
      function desactivarUsuario(idUsr){

        const idUsuario = idUsr;

        Swal.fire({
          title: 'Estas seguro?',
          text: "El usuario será desactivado",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, desactivar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          // Validamos si se confirma
          if (result.isConfirmed) {
            // creamos un ajax
            $.ajax({
              url: '../../public/procesos/usuario/desactivarUsuario.php',
              type: 'POST',
              data: { id_usuario: idUsuario },
              dataType: 'json',
              success:function(res){

                if (res.error) {

                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: res.mensaje
                  });

                }else{
                  Swal.fire({
                    icon: 'success',
                    title: 'Desactivado',
                    text: res.mensaje
                  });
                  setTimeout(() => {
                    $('#tablaUsuarios').load('../componentes/tablaUsuarios.php');
                  },1600);
                }
              }
            }) 
          }
        })
    	}
    </script>
  </body>
</html>