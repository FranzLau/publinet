<!-- Modal -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="ModalNewProd" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="ModalNewProd">
          <i class="fa-regular fa-square-plus fa-sm mr-2"></i>Ingresa un Producto
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--***************************   INICIO DEL FORMULARIO   ***********************-->
        <form id="formRegProducto" class="formRegProducto">
          <div class="form-group row">
            <label for="addNomProd" class="col-sm-3 col-form-label col-form-label-sm">Nombre:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="addNomProd" id="addNomProd">
            </div>
          </div>
          <div class="form-group row">
            <label for="descProd" class="col-sm-3 col-form-label col-form-label-sm">Descripcion:</label>
            <div class="col-sm-9">
              <textarea class="form-control" name="descProd" id="descProd" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="addCategProd" class="col-sm-3 col-form-label col-form-label-sm">Categoria:</label>
            <div class="col-sm-6">
              <select class="custom-select custom-select-sm" id="addCategProd" name="addCategProd" style="width:100%">
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
          <div class="form-group row">
            <label for="addMarcaProd" class="col-sm-3 col-form-label col-form-label-sm">Marca:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-sm" id="addMarcaProd" name="addMarcaProd">
            </div>
          </div>
          <div class="form-group row">
            <label for="addModeloProd" class="col-sm-3 col-form-label col-form-label-sm">Modelo:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" id="addModeloProd" name="addModeloProd">
            </div>
          </div>
          <div class="form-group row">
            <label for="addPrecEqProd" class="col-sm-3 col-form-label col-form-label-sm">Precio Equipo:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" id="addPrecEqProd" name="addPrecEqProd" placeholder="s/">
            </div>
          </div>
          <div class="form-group row">
            <label for="addPrecioFullProd" class="col-sm-3 col-form-label col-form-label-sm">Precio Full:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" id="addPrecioFullProd" name="addPrecioFullProd" placeholder="s/">
            </div>
          </div>
          <div class="form-group row">
            <label for="addStockProd" class="col-sm-3 col-form-label col-form-label-sm">Cantidad:</label>
            <div class="col-sm-3">
              <input type="number" class="form-control form-control-sm" id="addStockProd" name="addStockProd" placeholder="0">
            </div>
          </div>
          <div class="form-group row">
            <label for="addImgProd" class="col-sm-3 col-form-label col-form-label-sm">Subir Imagen:</label>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input form-control form-control-sm" id="addImgProd" name="addImgProd" accept="image/*">
                <label class="custom-file-label col-form-label col-form-label-sm" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
         
        </form>
        <!--***** FIN DEL FORMULARIO *******<<<<<<<-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-sm btn-primary" id="btnGuardarProducto">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar
        </button>
      </div>
    </div>
  </div>
</div>
