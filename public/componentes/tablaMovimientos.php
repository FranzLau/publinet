<?php
  session_start();
  require '../../config/conexion.php';
  require '../../config/data.php';
  $obj = new data();
  $sql = $con->query("SELECT MIN(id_mov),MIN(fecha_mov),MIN(tipo_mov),MIN(id_emp),MIN(id_sede) FROM movimiento GROUP BY id_mov");
?>
<div class="table-responsive">
  <table class="table table-hover table-bordered table-sm" id="tableMove" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>FOLIO</th>
        <th>FECHA</th>
        <th>TIPO</th>
        <th>RESPONSABLE</th>
        <th>SEDE</th>
        <th>FICHA</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      <?php while($verMoves = $sql->fetch_row()){ ?>
      <tr>
        <td><?php echo $verMoves[0] ?></td>
        <td><?php echo $verMoves[1] ?></td>
        <td><?php echo $verMoves[2] ?></td>
        <td><?php echo $obj->nomEmp( $verMoves[3]) ?></td>
        <td><?php echo $obj->nomSede( $verMoves[4]) ?></td>
        <td>
            <!--<a href="../procesos/asignacion/crearReportePdf.php?idmov=<?php echo $verMoves[0] ?>" target="_blank" class="btn-link-delete" title="Reporte">
              <i class="fa-solid fa-file-pdf"></i> FICHA
            </a>-->
            <a href="../views/fichas/fichaMovimiento.php?idmov=<?php echo $verMoves[0] ?>" class="btn-link-delete ml-2" target="_blank" title="Reporte">
              <i class="fa-solid fa-file-pdf"></i> Print Ficha
            </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tableMove').DataTable({
      order: [[0, 'desc']],
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