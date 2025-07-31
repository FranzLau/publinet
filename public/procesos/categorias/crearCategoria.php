<?php
	require '../../../config/conexion.php';

	// Recibir datos del dormulario
	$nomCategoria = trim($_POST['nomCateg'] ?? '');
	$descCategoria = trim($_POST['descCateg'] ?? '');

	// validar campos obligatorios
	if ($nomCategoria === '') {
		echo json_encode(['error' => true, 'mensaje' => 'El nombre de la categoria es obligatorio']);
		exit; 
	}

	// Verificar si ya existe una categoria con el mismo nombre (opcional)
	$verificar = $con->prepare("SELECT 1 FROM categoria WHERE nom_categoria = ?");
	$verificar->bind_param("s", $nomCategoria);
	$verificar->execute();
	$verificar->store_result();

	if ($verificar->num_rows > 0) {
		echo json_encode(['error' => true, 'mensaje' => 'Ya existe una categoria con ese nombre']);
		$verificar->close();
		exit;
	}
	$verificar->close();

	// Insertamos nuev acategoria
	$stmt = $con->prepare("INSERT INTO categoria (nom_categoria, desc_categoria) VALUES (?,?)");

	if (!$stmt) {
		echo json_encode(['error' => true, 'mensaje' => 'Error al preparar la consulta']);
		exit; 
	}

	$stmt->bind_param("ss", $nomCategoria,$descCategoria);

	if ($stmt->execute()) {
		echo json_encode(['error' => false, 'mensaje' => 'Categoria registrada correctamente']);
	} else {
		echo json_encode(['error' => true, 'mensaje' => 'Error al registrar categoria']);
	}

	$stmt->close();
	$con->close();
?>
