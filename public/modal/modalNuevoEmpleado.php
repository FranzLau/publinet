<!-- Modal NUEVO EMPLEADO-->
<div class="modal fade" id="modalNuevoEmpleado" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">
          Registro de empleado
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--******************   INICIO DEL FORMULARIO   *******************-->
        <form id="formNuevoEmpleado">
          <div class="form-group row">
            <label for="nombreEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Nombres:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" id="nombreEmpleado" name="nombreEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="apellidoEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Apellidos:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control form-control-sm" id="apellidoEmpleado" name="apellidoEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="dniEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Nº de Documento:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" id="dniEmpleado" name="dniEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="telEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Telefono:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form-control-sm" id="telEmpleado" name="telEmpleado">
            </div>
          </div>
          <div class="form-group row">
            <label for="cargoEmpleado" class="col-sm-4 col-form-label col-form-label-sm">Cargo:</label>
            <div class="col-sm-6">
              <select class="custom-select custom-select-sm" id="cargoEmpleado" name="cargoEmpleado" style="width:100%">
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
          <!--*****************************   FIN DEL FORMULARIO   *************************-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-primary btn-sm" id="btnGuardarEmpleado">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar
        </button>
      </div>
    </div>
  </div>
</div>