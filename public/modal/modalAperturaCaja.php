<!-- Modal -->
<div class="modal fade" id="modalAperturarCaja" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ejemModalCaja" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="ejemModalCaja">Aperturar Caja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <form id="formAperturarCaja">
              <div class="form-group">
                <label for="montoInicialCaja" class="col-form-label col-form-label-sm font-weight-bold">Monto Inicial (S/):</label>
                <input type="number" step="0.01" min="0" class="form-control form-control-sm" id="montoInicialCaja" name="montoInicialCaja">
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" id="btnAperturarCaja">
          <i class="fa-sharp fa-solid fa-unlock fa-sm text-white-50 mr-2"></i>Abrir Caja
        </button>
      </div>
    </div>
  </div>
</div>