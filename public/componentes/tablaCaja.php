<?php
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM caja");
?>
<div class="table-responsive">
  <table class="table table-bordered table-hover table-sm dtr-inline no-footer" width="100%" cellspacing="0" id="tablaCaja">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>USUARIO</th>
        <th>FECHA APERTURA</th>
        <th>FECHA CIERRE</th>
        <th>MONTO INICIAL</th>
        <th>MONTO FINAL</th>
        <th>ESTADO</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php while($vercaja = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $vercaja[0] ?></td>
          <td><?php echo $vercaja[1] ?></td>
          <td><?php echo $vercaja[2] ?></td>
          <td><?php echo $vercaja[3] ?></td>
          <td><?php echo $vercaja[4] ?></td>
          <td><?php echo $vercaja[5] ?></td>
          <td><span class="badge badge-success"><?php echo $vercaja[6] ?></span></td>
          <td>
            <a href="#" class="btn btn-warning btn-circle btn-sm mr-3" title="Editar" data-toggle="modal" data-target="#modalEditarCategoria" onclick="leerCaJa('<?php echo $vercaja[0] ?>')">
              <i class="fas fa-pencil-alt"></i>
            </a>
            <!--<a href="#" class="btn btn-danger btn-circle btn-sm" title="Eliminar" onclick="eliminaCategoria('<?php echo $vercaja[0] ?>')">
              <i class="fas fa-trash-alt"></i>-->
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
$(document).ready(function() {
  $('#tablaCaja').DataTable({
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros por página",
      "zeroRecords": "Nada encontrado, lo siento!",
      "info": "Mostrando página _PAGE_ de _PAGES_",
      "infoEmpty": "No hay registros disponibles",
      "infoFiltered": "(filtered from _MAX_ total records)",
      "search": "Buscar",
      "paginate": {
        "first":      "Primero",
        "previous":   "Anterior",
        "next":       "Siguiente",
        "last":       "Último"
      }
    }
  });
});
</script>