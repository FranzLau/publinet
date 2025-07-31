<?php
	require '../../../config/conexion.php';

	$IdProd =$_POST['idEditarProducto'];
	
	$EditarNomProd = $_POST['nomEditarProd'];
	$EditarDescProd = $_POST['descEditarProd'];
	$EditarIdCateg = $_POST['categEditarProd'];
	$EditarMarcaProd = $_POST['marcaEditarProd'];
	$EditarModeloProd = $_POST['modeloEditarProd'];
	$EditarPrecioProd = $_POST['precio1EditarProd'];
	$EditarPrecio2Prod = $_POST['precio2EditarProd'];
	$EditarCantProd = $_POST['cantEditarProd'];
	
	// verificamos que el modelo de producto ya exista
	$verificar = $con->prepare("SELECT 1 FROM producto WHERE modelo_prod = ? AND id_prod != ?");
	$verificar->bind_param("si", $EditarModeloProd, $IdProd);
	$verificar->execute();
	$verificar->store_result();

	if ($verificar->num_rows > 0) {
		echo json_encode(['error' => true, 'mensaje' => 'Ya existe un producto de ese Modelo']);
		$verificar->close();
		exit;
	}
	$verificar->close();

	// 1. Actualizar Producto
	$update = $con->prepare("UPDATE producto SET id_categoria = ?, nom_prod = ?, descripcion_prod = ?, marca_prod = ?, modelo_prod = ?, stock_prod = ?, precio_equipo = ?, precio_full = ? WHERE id_prod = ?");
	$update->bind_param("issssiddi",$EditarIdCateg,$EditarNomProd,$EditarDescProd,$EditarMarcaProd,$EditarModeloProd,$EditarCantProd,$EditarPrecioProd,$EditarPrecio2Prod,$IdProd);

	if (!$update->execute()) {
		// Si hubo un error al ejecutar la consulta, muestra un mensaje de error
		echo json_encode(['error' => true, 'mensaje' => 'Error al actualizar Producto']);
		exit; 
	}

	// Empleado actualziado correctamente.
	echo json_encode(['error' => false, 'mensaje' => 'Producto actualizado correctamente']); 
	$con->close();
?>
