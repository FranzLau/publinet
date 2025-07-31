<?php
	require '../../../config/conexion.php';
	
	$id_user =(int) $_POST['idEditarUser'];
	$id_rol = (int) $_POST['rolEditUser'];
	$estado_user = (int) $_POST['estadoEditUser'];
	$nueva_pass1 = $_POST['passEditUser'] ?? '';
	$confirma_pass1 = $_POST['pass2EditUser'] ?? '';

	
	// Validar datos basicos
	if ($estado_user !== 1 && $estado_user !== 2) {
		echo json_encode(['error' => true, 'codigo' => 1, 'mensaje' => 'El estado es invalido']); // El estado es invalido
		exit;
	}

	// 1. Actualizar el estado y rol
	$update = $con->prepare("UPDATE usuario SET id_rol = ?, estado_usuario = ? WHERE id_usuario = ?");
	$update->bind_param("iii",$id_rol,$estado_user,$id_user); 

	if (!$update->execute()) {
		echo json_encode(['error' => true, 'codigo' => 2, 'mensaje' => 'Error al actualizar Estado/Rol']); // Error al actualizar estado/rol
		exit; 
	}

	// 2. Si el admin escribio una nueva contraseña
	if (!empty($nueva_pass1) || !empty($confirma_pass1)) {
		
		// validamos coincidencias y longitud
		if ($nueva_pass1 !== $confirma_pass1) {
			echo json_encode(['error' => true, 'codigo' => 3,'mensaje' => 'Las contraseñas no coinciden']); // Las contraseñas no coinciden
			exit;
		}

		if (strlen($nueva_pass1) < 6) {
			echo json_encode(['error' => true, 'codigo' => 4, 'mensaje' => 'La contraseña debe tener al menos 6 caracteres']); // Las contraseñas debe tener al menos 6 caracteres
			exit;
		}

		// Hasheamos la nueva contraseña
		$hash = password_hash($nueva_pass1, PASSWORD_DEFAULT);

		// Actualizar contraseña
		$update2 = $con->prepare("UPDATE usuario SET pass_usuario = ? WHERE id_usuario = ?");
		$update2->bind_param("si",$hash,$id_user);

		if (!$update2->execute()) {
			echo json_encode(['error' => true, 'codigo' => 5, 'mensaje' => 'Error al actuaizar contraseña']); // Error al actualizar contraseña
			exit;
		}
	}

	echo json_encode(['error' => false, 'codigo' => 0, 'mensaje' => 'Usuario actualizado correctamente']); // Usuario actualizado correctamente

	$con->close();
?>