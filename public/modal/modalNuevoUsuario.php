<!-- Modal -->
<div class="modal fade" id="modalNuevoUser" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Registro de Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formNewUser">
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="emp-user" class="col-form-label col-form-label-sm font-weight-bold">Empleado:</label>
            <select class="custom-select custom-select-sm" id="emp-user" name="emp-user" style="width:100%">
                <option selected disabled>Elegir...</option>
                <?php $ctg = $con->query("SELECT * FROM empleado");
                    while ($row = $ctg->fetch_assoc()) {
                      echo "<option value='".$row['id_emp']."' ";
                      echo ">";
                      echo $row['nom_emp'],' ', $row['ape_emp'];
                      echo "</option>";
                    }
                ?>
            </select>
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="rol-user" class="col-form-label col-form-label-sm font-weight-bold">Rol:</label>
            <select class="custom-select custom-select-sm" id="rol-user" name="rol-user" style="width:100%">
                <option selected disabled>Elegir...</option>
                <?php $ctg = $con->query("SELECT * FROM rol");
                    while ($row = $ctg->fetch_assoc()) {
                      echo "<option value='".$row['id_rol']."' ";
                      echo ">";
                      echo $row['nom_rol'];
                      echo "</option>";
                    }
                ?>
            </select>
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="nom-user" class="col-form-label col-form-label-sm font-weight-bold">Usuario:</label>
            <input type="text" name="nom-user" id="nom-user" class="form-control form-control-sm">
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="pass-user" class="col-form-label col-form-label-sm font-weight-bold">Contraseña:</label>
            <input type="password" name="pass-user" id="pass-user" class="form-control form-control-sm" placeholder="Ingrese contraseña">
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="pass2-user" class="col-form-label col-form-label-sm font-weight-bold">Confirmar Contraseña:</label>
            <input type="password" name="pass2-user" id="pass2-user" class="form-control form-control-sm" placeholder="Confirmar contraseña">
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-primary btn-sm" id="btnSaveUser">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar
        </button>
      </div>
    </div>
  </div>
</div>