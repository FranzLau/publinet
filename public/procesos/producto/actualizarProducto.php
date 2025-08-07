<?php
	header('Content-Type: application/json');
	require '../../../config/conexion.php';
	require '../../../modelos/Producto.php';

	$IdProd = intval($_POST['idEditarProducto'] ?? 0);

	$datos = [
		'id_categoria' 		=> intval($_POST['categEditarProd'] ?? 0),
		'nom_prod' 			=> trim($_POST['nomEditarProd'] ?? ''),
		'descripcion_prod' 	=> trim($_POST['descEditarProd'] ?? ''),
		'marca_prod' 		=> trim($_POST['marcaEditarProd'] ?? ''),
		'modelo_prod' 		=> trim($_POST['modeloEditarProd'] ?? ''),
		'stock_prod' 		=> intval($_POST['cantEditarProd'] ?? 0),
		'precio_equipo'		=> floatval($_POST['precio1EditarProd'] ?? 0),
		'precio_full' 		=> floatval($_POST['precio2EditarProd'] ?? 0)
	];
	
	$producto = new Producto($con);
	$resultado = $producto->editarProducto($IdProd, $datos, $_FILES['imgNuevaEditar'] ?? null);

	echo json_encode($resultado);

?>
