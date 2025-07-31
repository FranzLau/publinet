<?php
    require '../../config/conexion.php';
    require '../../config/data.php';
    $obj = new data();
    $sqlemp = $con->query("SELECT * FROM empleado");
?>
  <!-- DataTales Example -->
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-sm" id="tablaEmpleado" width="100%" cellspacing="0">
      <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>LOGO</th>
            <th>NOMBRES y APELLIDO</th>
            <th>CARGO</th>
            <th>DNI.</th>
            <th>TELEFONO</th>
            <th class="text-center">ACCIONES</th>
          </tr>
      </thead>
      <tbody>
          <?php
          while($mostrar = $sqlemp->fetch_row()){
          ?>
          <tr>
              <td class="text-center"><?php echo $mostrar[0] ?></td>
              <td> <span class="badge badge-primary"><i class="fas fa-user mr-2"></i>Publigraff</span> </td>
              <td><?php echo $mostrar[2] ?> <?php echo $mostrar[3] ?></td>
              <td><?php echo $obj->nomCargo( $mostrar[1]) ?></td>
              <td><?php echo $mostrar[4] ?></td>
              <td><?php echo $mostrar[5] ?></td>
              
              <td class="text-center">
                
                <a href="#" class="mr-3 btn btn-warning btn-sm" title="Editar" data-toggle="modal" data-target="#modalEditarEmpleado" onclick="verDatosEmpleado('<?php echo $mostrar[0] ?>')"><i class="fas fa-pen"></i></a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar" onclick="borrarEmpleado('<?php echo $mostrar[0] ?>')"><i class="fas fa-trash-alt"></i></a>

              </td>
          </tr>
          <?php
            }
          ?>
      </tbody>
    </table>
  </div>
  <script>
    $(document).ready(function() {
         $('#tablaEmpleado').DataTable({
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
