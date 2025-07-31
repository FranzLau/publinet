<!-- Modal EDITAR EMPLEADO-->
<div class="modal fade" id="modalEditarEmpleado" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">
          Editar Empleado
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditarEmpleado">
          
          <input type="text" id="idEditarEmpleado" name="idEditarEmpleado" hidden>

          <div class="form-group row">
            <label for="nomEditarEmpleado" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Nombres:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" id="nomEditarEmpleado" name="nomEditarEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="apeEditarEmpleado" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Apellidos:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" id="apeEditarEmpleado" name="apeEditarEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="dniEditarEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Nº de Documento:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" id="dniEditarEmpleado" name="dniEditarEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="telEditarEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Telefono:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" id="telEditarEmpleado" name="telEditarEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="cargoEditarEmpleado" class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">Cargo:</label>
            <div class="col-sm-6">
              <select class="custom-select custom-select-sm" id="cargoEditarEmpleado" name="cargoEditarEmpleado" style="width:100%">
                <option selected disabled>Elegir...</option>
                <?php $ctg = $con->query("SELECT * FROM cargo");
                    while ($row = $ctg->fetch_assoc()) {
                      echo "<option value='".$row['id_cargo']."' ";
                      echo ">";
                      echo $row['nom_cargo'];
                      echo "</option>";
                    }
                ?>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-warning btn-sm" id="btnEditarEmpleado">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar Cambios
        </button>
      </div>
    </div>
  </div>
</div>
