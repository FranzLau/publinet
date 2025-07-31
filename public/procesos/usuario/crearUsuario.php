<?php
	require '../../../config/conexion.php';

	$id_rol = (int) $_POST['rol-user'];
	$id_emp = (int) $_POST['emp-user'];
	$nom_user = trim($_POST['nom-user']);
	$pass_user = $_POST['pass-user'] ?? '';
	$pass2_user = $_POST['pass2-user'] ?? '';

	$estado_user = 1;
	$fecha_registro = date('Y-m-d');

	// Validar campos minimos 
	if (empty($nom_user) || empty($pass_user) || empty($pass2_user)) {
		echo json_encode(['error' => true, 'codigo' => 1, 'mensaje' => 'Todos los campos son obligatorios']);
		exit; 
	}

	// Validar que las contraseñas coincidan 
	if ($pass_user !== $pass2_user) {
		echo json_encode(['error' => true, 'codigo' => 2, 'mensaje' => 'Las contraseñas no coinciden']);
		exit;
	}

	//Validar Longitud de la contraseña
	if (strlen($pass_user) < 6) {
		echo json_encode(['error' => true, 'codigo' => 3, 'mensaje' => 'La contraseña debe tener al menos 6 caracteres']);
		exit;
	}

	// Verificamos si el nombre de usuario ya existe (con prepared statement)
	$check = $con->prepare("SELECT 1 FROM usuario WHERE nom_usuario = ?");
	$check->bind_param("s", $nom_user);
	$check->execute();
	$check->store_result();

	if ($check->num_rows > 0) {
		echo json_encode(['error' => true, 'codigo' => 4, 'mensaje' => 'El nombre de usuario ya existe']);
		exit;
	}

	// Hashear la contraseña
	$hash = password_hash($pass_user, PASSWORD_DEFAULT);

	// Insertar nuevo usuario
	$insert = $con->prepare("INSERT INTO usuario (id_rol,id_emp,nom_usuario,pass_usuario,estado_usuario,fecha_captura) VALUES  (?,?,?,?,?,?)");
	$insert->bind_param("iissis",$id_rol,$id_emp,$nom_user,$hash,$estado_user,$fecha_registro);

	if ($insert->execute()) {
		echo json_encode(['error' => false, 'codigo' => 0, 'mensaje' => 'Usuario registrado correctamente']);
	} else {
		echo json_encode(['error' => true, 'codigo' => 5, 'mensaje' => 'Error al registrar usuario']);
	}

	$con->close();
?>