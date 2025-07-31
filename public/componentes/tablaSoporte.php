<?php
  session_start();
  require '../../config/conexion.php';
  require '../../config/data.php';
  $obj = new data();
  $sql = $con->query("SELECT * FROM soporte");
 ?>
<div class="table-responsive">
  <table class="table table-hover table-sm" id="tableSupport" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>FECHA / INICIO</th>
            <th>UBICACION</th>
            <th>USUARIO</th>
            <th>EQUIPO</th>
            <th>SERVICIO</th>
            <th>TIPO</th>
            <th>TICKET</th>
            <th>FECHA / FIN</th>
            <th>SOLUCION</th>
            <th>OPCIONES</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>FECHA / INICIO</th>
            <th>UBICACION</th>
            <th>USUARIO</th>
            <th>EQUIPO</th>
            <th>SERVICIO</th>
            <th>TIPO</th>
            <th>TICKET</th>
            <th>FECHA / FIN</th>
            <th>SOLUCION</th>
            <th>OPCIONES</th>
        </tr>
    </tfoot>
    <tbody>
      <?php while($mostrarprod = $sql->fetch_row()){ ?>
      <tr>
        <td><?php echo $mostrarprod[3] ?></td>
        <td><?php echo $mostrarprod[1] ?></td>
        <td><?php echo $mostrarprod[2] ?></td>
        <td><?php echo $mostrarprod[5] ?></td>
        <td><?php echo $mostrarprod[6] ?></td>
        <td><?php echo $mostrarprod[7] ?></td>
        <td><?php echo $mostrarprod[8] ?></td>
        <td><?php echo $mostrarprod[4] ?></td>
        <td><?php echo $mostrarprod[11] ?></td>
        <td>
          
          <a href="#" class="btn-link-edit mr-3" title="Editar" data-toggle="modal" data-target="#modalEditarEquipo" onclick="verDatosEquipos('<?php echo $mostrarprod[0] ?>')"><i class="fas fa-pencil-alt"></i></a>
          <?php
            if ($_SESSION['loginUser']['id_rol'] == 1):
          ?>
          <a href="#" class="btn-link-delete" title="Eliminar" onclick="eliminarEquipo('<?php echo $mostrarprod[0] ?>')"><i class="fas fa-trash-alt"></i></a>
          <?php endif; ?>
        </td>
       </tr>
       <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tableSupport').DataTable({
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