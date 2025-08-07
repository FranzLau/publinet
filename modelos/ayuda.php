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

	// Verificar si se subió una nueva imagen
	$nuevaImagen = $_FILES['imgNuevaEditar'] ?? null;
	$idImagenNueva = null;

	if ($nuevaImagen && $nuevaImagen['error'] === 0) {
		// Carpeta de destino
		
		$nombreOriginal = basename($nuevaImagen['name']);
		$ext = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
		$nombreUnico = uniqid('img_', true) . '.' . $ext;
		$rutaFinal = '../../../uploads/' . $nombreUnico;

		if (!is_dir('../../../uploads/')) {
			mkdir('../../../uploads/', 0755, true);
		}

		// Mover archivo
		if (move_uploaded_file($nuevaImagen['tmp_name'], $rutaFinal)) {
			// Guardar en la tabla imagen
			$fechaSubida = date('Y-m-d H:i:s');
			$rutaBD = 'uploads/' . $nombreUnico;

			$insertImg = $con->prepare("INSERT INTO imagen (nombre_imagen, ruta_imagen, fecha_subida) VALUES (?, ?, ?)");
			$insertImg->bind_param("sss", $nombreOriginal, $rutaBD, $fechaSubida);

			if ($insertImg->execute()) {
				$idImagenNueva = $insertImg->insert_id;
			} else {
				echo json_encode(['error' => true, 'mensaje' => 'Error al guardar nueva imagen']);
				exit;
			}
		} else {
			echo json_encode(['error' => true, 'mensaje' => 'No se pudo mover la imagen al servidor']);
			exit;
		}
	}

	// Construcción dinámica de consulta UPDATE
	if ($idImagenNueva !== null) {
		$update = $con->prepare("UPDATE producto SET id_categoria = ?, id_imagen = ?, nom_prod = ?, descripcion_prod = ?, marca_prod = ?, modelo_prod = ?, stock_prod = ?, precio_equipo = ?, precio_full = ? WHERE id_prod = ?");
		$update->bind_param("iissssiddi", $EditarIdCateg, $idImagenNueva, $EditarNomProd, $EditarDescProd, $EditarMarcaProd, $EditarModeloProd, $EditarCantProd, $EditarPrecioProd, $EditarPrecio2Prod, $IdProd);
	} else {
		$update = $con->prepare("UPDATE producto SET id_categoria = ?, nom_prod = ?, descripcion_prod = ?, marca_prod = ?, modelo_prod = ?, stock_prod = ?, precio_equipo = ?, precio_full = ? WHERE id_prod = ?");
		$update->bind_param("issssiddi", $EditarIdCateg, $EditarNomProd, $EditarDescProd, $EditarMarcaProd, $EditarModeloProd, $EditarCantProd, $EditarPrecioProd, $EditarPrecio2Prod, $IdProd);
	}

	if (!$update->execute()) {
		echo json_encode(['error' => true, 'mensaje' => 'Error al actualizar Producto']);
		exit;
	}

	echo json_encode(['error' => false, 'mensaje' => 'Producto actualizado correctamente']);
	$con->close();
?>