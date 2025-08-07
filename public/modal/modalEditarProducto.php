<!-- Modal -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="exampleModalCenterTitle">
          <i class="fa-solid fa-file-pen mr-2"></i>Editar Producto
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- INICIO del Formulario -->
        <form id="formEditarProducto" enctype="multipart/form-data">
          <input type="text" name="idEditarProducto" id="idEditarProducto" hidden>


          <div class="row">
            <!-- Primera columna-->
            <div class="col-sm-6">
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Informacion General</h6>
                  <div class="form-group">
                    <label for="nomEditarProd" class="col-form-label col-form-label-sm font-weight-bold">Nombre:</label>
                    <input type="text" class="form-control form-control-sm" id="nomEditarProd" name="nomEditarProd">
                  </div>
                  <div class="form-group">
                    <label for="descEditarProd" class="col-form-label col-form-label-sm font-weight-bold">Descripción :</label>
                    <textarea class="form-control" name="descEditarProd" id="descEditarProd" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Detalles</h6>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="marcaEditarProd" class="col-form-label col-form-label-sm font-weight-bold">Marca:</label>
                      <input type="text" class="form-control form-control-sm" id="marcaEditarProd" name="marcaEditarProd">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="modeloEditarProd" class="col-form-label col-form-label-sm font-weight-bold">Modelo:</label>  
                      <input type="text" class="form-control form-control-sm" id="modeloEditarProd" name="modeloEditarProd">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Precios ( s/. )</h6>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="precio1EditarProd" class="col-form-label col-form-label-sm font-weight-bold">Precio Equipo:</label>
                      <input type="text" class="form-control form-control-sm" id="precio1EditarProd" name="precio1EditarProd" placeholder="s/.">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="precio2EditarProd" class="col-form-label col-form-label-sm font-weight-bold">Precio Completo:</label>
                      <input type="text" class="form-control form-control-sm" id="precio2EditarProd" name="precio2EditarProd" placeholder="s/.">
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- Primera columna ********************** -->
            <div class="col-sm-6">
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Imagen de producto</h6>
                  <div class="form-group">
                    <label for="imagenActualEditar" class="col-form-label col-form-label-sm">Imagen Actual:</label><br>
                    <img id="imagenActualEditar" src="" alt="Imagen del producto" width="120"><br>
                  </div>
                  <div class="form-group">
                    <label for="imgNuevaEditar" class="col-form-label col-form-label-sm">Cambiar Imagen (opcional):</label>
                    <input type="file" class="form-control-file" id="imgNuevaEditar" name="imgNuevaEditar">
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Categoria de producto</h6>
                  <div class="form-group">
                    <label for="categEditarProd" class="col-form-label col-form-label-sm font-weight-bold">Categoria:</label>
                    <select class="form-control form-control-sm" id="categEditarProd" name="categEditarProd" style="width:100%">
                      <option value="">Elije categoria</option>
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
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <h6 class="m-0 font-weight-bold text-primary">Stock de producto</h6>
                  <div class="form-group">
                    <label for="cantEditarProd" class="col-form-label col-form-label-sm font-weight-bold">Cantidad:</label>
                    <input type="number" class="form-control form-control-sm" id="cantEditarProd" name="cantEditarProd">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- Fin de Form -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-warning btn-sm" id="btnEditarProducto">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar Cambios
        </button>
      </div>
    </div>
  </div>
</div>
