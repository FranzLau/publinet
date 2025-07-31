<!-- Modal -->
<div class="modal fade" id="modalCrearSede" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">Nueva Sede</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formNuevaSede">
          <div class="form-group">
            <label for="nomNuevaSede" class="col-form-label col-form-label-sm">Sede:</label>
            <input type="text" name="nomNuevaSede" id="nomNuevaSede" class="form-control form-control-sm font-weight-bold">
          </div>
          
          <div class="form-group">
            <label for="ciudadNuevaSede" class="col-form-label col-form-label-sm">Ciudad:</label>
            <input type="text" name="ciudadNuevaSede" id="ciudadNuevaSede" class="form-control form-control-sm font-weight-bold">
          </div>
          <div class="form-group">
            <label for="dirNuevaSede" class="col-form-label col-form-label-sm">Dirección:</label>
            <textarea name="dirNuevaSede" id="dirNuevaSede" aria-describedby="datesSede" class="form-control form-control-sm font-weight-bold" rows="2"></textarea>
            <small id="datesSede" class="form-text text-muted">Todos los campos son obligatorios.</small>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-primary btn-sm" id="btnCrearSede">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar
        </button>
      </div>
    </div>
  </div>
</div>
