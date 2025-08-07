<?php
  session_start();
  require '../../config/conexion.php';
  require '../../config/data.php';
  $obj = new data();
  //$sql = $con->query("SELECT * FROM producto");
  $sql = $con->query("SELECT p.id_prod, i.ruta_imagen, p.id_categoria, p.nom_prod, p.descripcion_prod, p.marca_prod, 
                           p.modelo_prod, p.stock_prod, p.precio_equipo, p.precio_full  
                    FROM producto p
                    LEFT JOIN imagen i ON p.id_imagen = i.id_imagen");
 ?>
<div class="table-responsive">
  <table class="table table-hover table-sm" id="tableProduc" width="100%" cellspacing="0">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>IMAGEN</th>
        <th>CATEGORIA</th>
        <th>DETALLES</th>
        <th>MARCA</th>
        <th>MODELO</th>
        <th>STOCK</th>
        <th>PRECIO</th>
        <th>PRECIO 2</th>
        <th class="text-center">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $numero = 1;
        while($mostrarprod = $sql->fetch_row()){ 
      ?>
      <tr>
        <td><?php echo $numero++ ?></td>
        <td>
          <?php if (!empty($mostrarprod[1])): 
            $rutaImagen = "../../" . $mostrarprod[1]; // Ajusta según ruta real
          ?>
            <img src="<?php echo $rutaImagen ?>" 
                width="60" height="60" style="cursor:pointer; object-fit:cover;" 
                onclick="mostrarImagenModal('<?php echo $rutaImagen ?>')" 
                alt="Imagen producto">
          <?php else: ?>
            <span>Sin imagen</span>
          <?php endif; ?>
        </td>
        <td><?php echo $obj->nomCategoria( $mostrarprod[2]) ?></td>
        <td><?php echo $mostrarprod[4] ?></td>
        <td><?php echo $mostrarprod[5] ?></td>
        <td><?php echo $mostrarprod[6] ?></td>
        <td><span class="badge badge-secondary"><?php echo $mostrarprod[7] ?></span></td>
        <td><span class="badge badge-info">s/ <?php echo $mostrarprod[8] ?></span></td>
        <td><span class="badge badge-success">s/ <?php echo $mostrarprod[9] ?></span></td>
       
        <td class="text-center">
          
          <a href="#" class="btn btn-warning btn-sm mr-3" title="Editar" data-toggle="modal" data-target="#modalEditarProducto" onclick="verDatosProducto('<?php echo $mostrarprod[0] ?>')">
            <i class="fas fa-pencil-alt"></i>
          </a>

          <?php
            if ($_SESSION['loginUser']['id_rol'] == 1):
          ?>
          
          <a href="#" class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarProducto('<?php echo $mostrarprod[0] ?>')">
            <i class="fas fa-trash-alt"></i>
          </a>
          
          <?php endif; ?>
        </td>
       </tr>
       <?php } ?>
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#tableProduc').DataTable({
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
