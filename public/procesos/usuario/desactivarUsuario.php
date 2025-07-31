<?php
	require '../../../config/conexion.php';

	$id_usuario = $_POST['id_usuario'] ?? '';

	// validamos que exista un valor
	if (empty($id_usuario)) {
		echo json_encode(['error' => true, 'mensaje' => 'ID inválido']);
		exit;
	}

	// realizamos el cambio
	$stmt = $con->prepare("UPDATE usuario SET estado_usuario = 2 WHERE id_usuario = ?");
	$stmt->bind_param("i", $id_usuario);

	// validamos 
	if ($stmt->execute()) {
		echo json_encode(['error' => false, 'mensaje' => 'Usuario desactivado correctamente']);
	} else {
		echo json_encode(['error' => true, 'mensaje' => 'Error al desactivar usuario']);
	}

 ?>