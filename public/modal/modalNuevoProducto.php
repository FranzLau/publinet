<!-- Modal -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="ModalNewProd" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="ModalNewProd">
          <i class="fa-solid fa-store mr-2"></i>Agregar Producto
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--***************************   INICIO DEL FORMULARIO   ***********************-->
        <form id="formRegProducto" class="formRegProducto">

          <div class="card mb-3">
            <div class="card-body">
              <h6 class="m-0 font-weight-bold text-primary">Informacion General</h6>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="addNomProd" class="col-form-label col-form-label-sm">Nombre:</label>
                  <input type="text" class="form-control form-control-sm" name="addNomProd" id="addNomProd">
                </div>
                <div class="form-group col-md-6">
                  <label for="addCategProd" class="col-form-label col-form-label-sm">Categoria:</label>
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
              <div class="form-group">
                <label for="descProd" class="col-sm-3 col-form-label col-form-label-sm">Descripcion:</label>
                <textarea class="form-control" name="descProd" id="descProd" rows="3"></textarea>
              </div>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <h6 class="m-0 font-weight-bold text-primary">Detalles de producto</h6>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="addMarcaProd" class="col-form-label col-form-label-sm">Marca:</label>
                  <input type="text" class="form-control form-control-sm" id="addMarcaProd" name="addMarcaProd">
                </div>
                <div class="form-group col-md-4">
                  <label for="addModeloProd" class="col-form-label col-form-label-sm">Modelo:</label>
                  <input type="text" class="form-control form-control-sm" id="addModeloProd" name="addModeloProd">
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <h6 class="m-0 font-weight-bold text-primary">Precio y Stock</h6>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="addPrecEqProd" class="col-form-label col-form-label-sm">Precio Equipo:</label>
                  <input type="text" class="form-control form-control-sm" id="addPrecEqProd" name="addPrecEqProd" placeholder="s/">
                </div>
                <div class="form-group col-md-4">
                  <label for="addPrecioFullProd" class="col-form-label col-form-label-sm">Precio Full:</label>
                  <input type="text" class="form-control form-control-sm" id="addPrecioFullProd" name="addPrecioFullProd" placeholder="s/">
                </div>
                <div class="form-group col-md-4">
                  <label for="addStockProd" class="col-form-label col-form-label-sm">Cantidad:</label>
                  <input type="number" class="form-control form-control-sm" id="addStockProd" name="addStockProd" placeholder="0">
                </div>
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
