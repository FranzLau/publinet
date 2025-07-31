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
                <div class="page-title mb-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa-solid fa-house mr-2"></i></a></li>
                            <li class="breadcrumb-item"><a href="producto.php">Productos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agregar Producto</li>
                        </ol>
                    </nav>
                </div>

                <section id="section-title" class="mb-4">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div>
                            <h1 class="h3 mb-1 text-gray-800"><i class="fa-solid fa-store mr-2"></i>Agregar Producto</h1>
                            <p>Agrega un nuevo producto a tu tienda</p>
                        </div>
                        <div class="d-none d-sm-inline-block">
                            <a href="producto.php" class="btn btn-secondary">
                                <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
                            </a>
                            <button type="button" class="btn btn-success" id="btnGuardarProducto">
                                <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar Producto
                            </button>
                        </div>
                    </div>
                    
                </section>
                
                <section id="section-form">
                    <form id="formRegProducto" class="formRegProducto" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <!-- Columna 01 *********************************** -->
                            <div class="col-sm-8">
                                <!-- Card 01 -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Informacion General</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="addNomProd" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control" name="addNomProd" id="addNomProd">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="addCategProd" class="col-form-label">Categoria de producto:</label>
                                                <select class="custom-select" id="addCategProd" name="addCategProd" style="width:100%">
                                                    <option value="" selected disabled>Elegir...</option>
                                                    <?php $ctg = $con->query("SELECT * FROM categoria");
                                                    while ($row = $ctg->fetch_assoc()) {
                                                        echo "<option value='".$row['id_categoria']."' ";
                                                        echo ">";
                                                        echo $row['nom_categoria'];
                                                        echo "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="descProd" class="col-form-label">Descripcion:</label>
                                            <textarea class="form-control" name="descProd" id="descProd" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card 02 -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Detalles de producto</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="addMarcaProd" class="col-form-label">Marca:</label>
                                                <input type="text" class="form-control" id="addMarcaProd" name="addMarcaProd">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="addModeloProd" class="col-form-label">Modelo:</label>
                                                <input type="text" class="form-control" id="addModeloProd" name="addModeloProd">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="addStockProd" class="col-form-label">Cantidad:</label>
                                                <input type="number" class="form-control" id="addStockProd" name="addStockProd" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna 02 *********************************** -->
                            <div class="col-sm-4">
                                <!-- Card 03 -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Imagen de Producto</h6>
                                    </div>
                                    <div class="card-body">
                                        <label for="file" class="img-area">
                                            <i class='fa-solid fa-cloud-arrow-up'></i>
                                            <h3>Cargar Imagen</h3>
                                            <p>El tamaño de la imagen debe ser inferior a <span>2MB</span></p>
                                        </label>
                                        <input type="file" id="file" name="addImagen" accept="image/*" hidden>
                                    </div>
                                </div>
                                <!-- Card 04 -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Precios y Stock</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="addPrecEqProd" class="col-form-label">Precio Equipo:</label>
                                                <input type="text" class="form-control" id="addPrecEqProd" name="addPrecEqProd" placeholder="s/">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="addPrecioFullProd" class="col-form-label">Precio Full:</label>
                                                <input type="text" class="form-control" id="addPrecioFullProd" name="addPrecioFullProd" placeholder="s/">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </section>
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
   
  </body>
</html>