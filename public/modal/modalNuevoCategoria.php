<!-- Modal -->
<div class="modal fade" id="modalCrearCategoria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header px-4">
        <h5 class="modal-title text-primary" id="exampleModalCenterTitle">
          Registra Categoria
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-4">
        <form id="formNuevaCategoria">
            <div class="form-group">
                <label for="nomCateg" class="col-form-label col-form-label-sm">Categoria:</label>
                <input type="text" class="form-control form-control-sm font-weight-bold" id="nomCateg" name="nomCateg">
            </div>
            <div class="form-group">
                <label for="descCateg" class="col-form-label col-form-label-sm">Descripcion:</label>
                <textarea name="descCateg" id="descCateg" rows="2" class="form-control form-control-sm font-weight-bold"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer px-4">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
          <i class="fa-solid fa-xmark fa-sm text-white-50 mr-2"></i>Cancelar
        </button>
        <button type="button" class="btn btn-sm btn-primary" id="btnCrearCategoria">
          <i class="fa-sharp fa-solid fa-floppy-disk fa-sm text-white-50 mr-2"></i>Guardar
        </button>
      </div>
    </div>
  </div>
</div>