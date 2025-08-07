<?php
	header('Content-Type: application/json');
	require '../../../config/conexion.php';
	require '../../../modelos/Producto.php';
	
	$idprod = $_POST['id_prod'] ?? 0;

	$productoElegido = new Producto($con);
	$resultado = $productoElegido->obtenerProducto($idprod);

	if ($resultado) {
		echo json_encode(['error' => false, 'datos' => $resultado]);
	} else {
		echo json_encode(['error' => true, 'mensaje' => 'Producto no encontrado']);
	}

 ?>
