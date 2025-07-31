<!-- Modal -->
<div class="modal fade" id="modalEditarSede" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Editar Sede</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEditarSede">
          <input type="text" name="idEditarSede" id="idEditarSede" hidden>

          <div class="form-group">
            <label for="nomEditarSede" class="col-form-label col-form-label-sm font-weight-bold">Sede:</label>
            <input type="text" name="nomEditarSede" id="nomEditarSede" class="form-control form-control-sm">
          </div>
          
          <div class="form-group">
            <label for="ciudadEditarSede" class="col-form-label col-form-label-sm font-weight-bold">Ciudad:</label>
            <input type="text" name="ciudadEditarSede" id="ciudadEditarSede" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="dirEditarSede" class="col-form-label col-form-label-sm font-weight-bold">Dirección:</label>
            <textarea name="dirEditarSede" id="dirEditarSede" aria-describedby="datesSede" class="form-control form-control-sm" rows="2"></textarea>
            <small id="datesSede" class="form-text text-muted">Puede editar los campos.</small>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-warning btn-sm" id="btnEditarSede">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar Cambios
        </button>
      </div>
    </div>
  </div>
</div>
