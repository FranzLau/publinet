<?php
  session_start();
  require '../../config/conexion.php';
  require '../../config/data.php';
  $obj = new data();
  $sql = $con->query("SELECT * FROM gerencia");
?>
<div class="table-responsive">
  <table class="table table-hover table-bordered table-sm" id="tableGeren" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      <?php while($vergeren = $sql->fetch_row()){ ?>
      <tr>
        <td><?php echo $vergeren[0] ?></td>
        <td><?php echo $vergeren[1] ?></td>
        <td>
            <a href="#" class="btn-link-edit mr-3" title="Editar" data-toggle="modal" data-target="#modalEdGerenc" onclick="leerGerencia('<?php echo $vergeren[0] ?>')"><i class="fas fa-pencil-alt"></i></a>
            <a href="#" class="btn-link-delete" title="Eliminar" onclick="eliminarGerencia('<?php echo $vergeren[0] ?>')"><i class="fas fa-trash-alt"></i></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tableGeren').DataTable({
      "iDisplayLength": 15,
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