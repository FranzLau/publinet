<?php
  session_start();
  require '../../config/conexion.php';
  require '../../config/data.php';
  $obj = new data();
  $sql = $con->query("SELECT * FROM cargo");
?>
<div class="table-responsive">
  <table class="table table-hover table-bordered table-sm" id="tableCargos" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th class="text-center">OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php while($vercargo = $sql->fetch_row()){ ?>
      <tr>
        <td><?php echo $vercargo[0] ?></td>
        <td><?php echo $vercargo[1] ?></td>
        <td class="text-center">
            <a href="#" class="btn btn-warning btn-sm mr-3" title="Editar" data-toggle="modal" data-target="#modalEdCargo" onclick="leerCargo('<?php echo $vercargo[0] ?>')"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarCargo('<?php echo $vercargo[0] ?>')"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tableCargos').DataTable({
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