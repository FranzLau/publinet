<!-- Modal -->
<div class="modal fade" id="modalEditUser" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditUser">
            <input type="text" name="idEditarUser" id="idEditarUser" hidden>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="form-group">
                <label for="empEditUser" class="col-form-label col-form-label-sm font-weight-bold">Empleado:</label>

                <select class="custom-select custom-select-sm" id="empEditUser" name="empEditUser" style="width:100%" disabled>
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
          <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="rolEditUser" class="col-form-label col-form-label-sm font-weight-bold">Rol:</label>
                <select class="custom-select custom-select-sm" id="rolEditUser" name="rolEditUser" style="width:100%">
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
            <div class="form-group col-sm-6">
                <label for="estadoEditUser" class="col-form-label col-form-label-sm font-weight-bold">Estado:</label>
                <select class="custom-select custom-select-sm" name="estadoEditUser" id="estadoEditUser">
                    <option selected disabled>Elegir...</option>
                    <option value="1">Activo </option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
          </div>
          
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="nomEditUser" class="col-form-label col-form-label-sm font-weight-bold">Usuario:</label>
            <input type="text" name="nomEditUser" id="nomEditUser" class="form-control form-control-sm" readonly>
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="passEditUser" class="col-form-label col-form-label-sm font-weight-bold">Nueva Contraseña:</label>
            <input type="password" name="passEditUser" id="passEditUser" class="form-control form-control-sm">
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="form-group">
            <label for="pass2EditUser" class="col-form-label col-form-label-sm font-weight-bold">Confirmar Contraseña:</label>
            <input type="password" name="pass2EditUser" id="pass2EditUser" class="form-control form-control-sm">
          </div>
          <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-warning btn-sm" id="btnEditUser">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar cambios
        </button>
      </div>
    </div>
  </div>
</div>