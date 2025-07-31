<!-- Modal -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">
          <i class="fa-regular fa-pen-to-square fa-sm mr-2"></i>Editar Producto
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- INICIO del Formulario -->
        <form id="formEditarProducto">

          <input type="text" name="idEditarProducto" id="idEditarProducto" hidden>
          <div class="form-group row">
            <label for="nomEditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Nombre:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" id="nomEditarProd" name="nomEditarProd">
            </div>
          </div>
          <div class="form-group row">
            <label for="descEditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Descripción :</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="descEditarProd" id="descEditarProd" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="categEditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Categoria:</label>
            <div class="col-sm-8">
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
          <div class="form-group row">
            <label for="marcaEditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Marca:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="marcaEditarProd" name="marcaEditarProd">
            </div>
          </div>
          <div class="form-group row">
            <label for="modeloEditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Modelo:</label>  
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="modeloEditarProd" name="modeloEditarProd">
            </div>
          </div>
          <div class="form-group row">
            <label for="precio1EditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Precio Producto:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="precio1EditarProd" name="precio1EditarProd" placeholder="s/.">
            </div>
          </div>
          <div class="form-group row">
            <label for="precio2EditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Precio Completo:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="precio2EditarProd" name="precio2EditarProd" placeholder="s/.">
            </div>
          </div>
          <div class="form-group row">
            <label for="cantEditarProd" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Cantidad:</label>
            <div class="col-sm-4">
              <input type="number" class="form-control form-control-sm" id="cantEditarProd" name="cantEditarProd">
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
