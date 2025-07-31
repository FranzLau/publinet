<?php
  require '../../config/conexion.php';
  require '../../config/data.php';
  $miClase = new data();
  $sql = $con->query("SELECT * FROM usuario ");
 ?>

<div class="table-responsive">
  <table class="table table-hover table-bordered table-sm" width="100%" cellspacing="0" id="tablaContrato">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>USUARIO</th>
        <th>ROL</th>
        <th>EMPLEADO</th>
        <th>ESTADO</th>
        <th class="text-center">OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php while($rowUsuario = $sql->fetch_row()){ ?>
        <tr>
          <td><?php echo $rowUsuario[0] ?></td>
          <td><?php echo $rowUsuario[3] ?></td>
          <td><?php echo $miClase->nomRol($rowUsuario[1]); ?></td>
          <td><?php echo $miClase->nomEmp($rowUsuario[2]); ?></td>
          
          <td>
            <?php 
              switch ($rowUsuario[5]){
                case "1":
                  echo '<span class="badge badge-success"><i class="fa-solid fa-check mr-2"></i>Activo</span>';
                  break;
                case "2":
                  echo '<span class="badge badge-danger"><i class="fa-solid fa-xmark mr-2"></i>Inactivo</span>';
                  break;  
              }
            ?>
          </td>

          <td class="text-center">
            <a href="#" class="mr-3 btn btn-warning btn-sm" title="Editar" data-toggle="modal" data-target="#modalEditUser" onclick="verDatosUsuario('<?php echo $rowUsuario[0] ?>')">
              <i class="fas fa-pen"></i>
            </a>
            <!--<a href="#" class="btn-link-delete" title="Eliminar" onclick="desactivarUsuario('<?php echo $rowUsuario[0] ?>')">
              <i class="fa-solid fa-lock"></i>
            </a>-->
          </td>
        </tr>
       <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tablaContrato').DataTable({
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
