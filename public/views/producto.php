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

    <?php include('../modal/modalNuevoProducto.php'); ?>
    <?php include('../modal/modalEditarProducto.php'); ?>
    
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
            <div class="page-title mb-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
              </nav>
              
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalAgregarProducto"><i class="fa-solid fa-circle-plus text-white-50 mr-2"></i>Agregar Producto</a>
              <!--<a href="agregarProducto.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fa-solid fa-circle-plus text-white-50"></i>
                Agregar Producto
              </a>-->
              <a href="categorias.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa-solid fa-gear text-white-50 mr-2"></i>Config. Categorias</a>
            </div>
            <!-- End Page title -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Productos</h6>
              </div>
              <div class="card-body">
                <div id="tablaProductos"></div>
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
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    <?php include('../include/scripts.php'); ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tablaProductos').load('../componentes/tablaProductos.php');
      });
    </script>
    
    <script type="text/javascript">
      function verDatosProducto(idprod){
        $.ajax({
          url: '../../public/procesos/producto/leerProducto.php',
          type: 'POST',
          data: {id_prod: idprod},
          dataType: 'json',
          success:function(r){
            if (r.error) {
              // Alerta de error, en caso exista el error
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: r.mensaje
              });
              
            } else {
              
              // llenar los campos del formulario con los datos recibidos
              $('#idEditarProducto').val(r.datos.id_prod);
              $('#categEditarProd').val(r.datos.id_categoria);
              $('#nomEditarProd').val(r.datos.nom_prod);
              $('#descEditarProd').val(r.datos.descripcion_prod);
              $('#marcaEditarProd').val(r.datos.marca_prod);
              $('#modeloEditarProd').val(r.datos.modelo_prod);
              $('#cantEditarProd').val(r.datos.stock_prod);
              $('#precio1EditarProd').val(r.datos.precio_equipo);
              $('#precio2EditarProd').val(r.datos.precio_full);
            }
          },
          error: function (xhr) {
            console.error(xhr.responseText);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'No se pudo obtener la informacion del producto'
            });
          }
        })
      }
      
      function eliminarProducto(idprod){
        Swal.fire({
            title: 'Estas seguro?',
            text: "No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4e73df',
            cancelButtonColor: '#e74a3b',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
            url: '../../public/procesos/producto/eliminarProducto.php',
            type: 'POST',
            data: "idprod=" + idprod,
            success:function(r){
              if (r==1) {
                $('#tablaProductos').load('../componentes/tablaProductos.php');
                Swal.fire(
                    'Eliminado!',
                    'Tu archivo ha sido eliminado.',
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