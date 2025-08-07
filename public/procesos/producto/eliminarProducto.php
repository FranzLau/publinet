<?php
	header('Content-Type: application/json');
	require '../../../config/conexion.php';
	require '../../../modelos/Producto.php';

	$idprod = $_POST['id_prod'] ?? 0;

	$producto = new Producto($con);
	$resultado = $producto->eliminarProducto($idprod);

	echo json_encode($resultado);
 ?>
