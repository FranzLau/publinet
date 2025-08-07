<?php
	header('Content-Type: application/json');
	require '../../../config/conexion.php';
	require '../../../modelos/Producto.php';

	$idCategoria = $_POST['addCategProd'] ?? null;
	$nombProducto = trim($_POST['addNomProd'] ?? '');
	$descProducto = trim($_POST['descProd'] ?? '');
	$marcaProducto = trim($_POST['addMarcaProd'] ?? '');
	$modeloProducto = trim($_POST['addModeloProd'] ?? '');
	$stockProducto = intval($_POST['addStockProd'] ?? 0);
	$precioEquipoProducto = floatval($_POST['addPrecEqProd'] ?? 0);
	$precioFullProducto = floatval($_POST['addPrecioFullProd'] ?? 0);
	
	$datos = [
		'id_categoria' => $idCategoria,
		'nom_prod' => $nombProducto,
		'descripcion_prod' => $descProducto,
		'marca_prod' => $marcaProducto,
		'modelo_prod' => $modeloProducto,
		'stock_prod' => $stockProducto,
		'precio_equipo' => $precioEquipoProducto,
		'precio_full' => $precioFullProducto
	];

	$producto = new Producto($con);
	$resultado = $producto->agregarProducto($datos, $_FILES['imagen'] ?? null);

	echo json_encode($resultado);
	exit;
?>
