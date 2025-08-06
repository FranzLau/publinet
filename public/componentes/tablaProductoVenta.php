<?php
  session_start();
  require '../../config/conexion.php';
  $sql = $con->query("SELECT * FROM producto");
?>
<div class="table-responsive">
  <table class="table table-hover table-bordered table-sm" id="tablaBuscaProducto" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>MODELO</th>
        <th>NOMBRE</th>
        <th>PRECIO 1</th>
        <th>PRECIO 2</th>
        <th>CANTIDAD</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody class="bg-white">
      <?php while($buscarProd = $sql->fetch_row()){ ?>
      <tr>
        <td><?php echo $buscarProd[0] ?></td>
        <td><?php echo $buscarProd[5] ?></td>
        <td><?php echo $buscarProd[2] ?></td>
        <td><?php echo $buscarProd[7] ?></td>
        <td><?php echo $buscarProd[8] ?></td>
        <td><input type="number" class="form-control form-control-sm" id="cantVentaProd" name="cantVentaProd"></td>
        <td class="text-center">
            <a href="#" class="btn btn-sm btn-info mr-3" title="Editar" data-toggle="modal" data-target="#modalEdArea" onclick="agregaCarrito('<?php echo $buscarProd[0] ?>')"><i class="fa-solid fa-plus"></i></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tablaBuscaProducto').DataTable({
      
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