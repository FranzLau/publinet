<?php
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

	require 'config/conexion.php';
	$con->set_charset('utf8');

	session_start();

	$usuariolg = $con->real_escape_string($_POST['userphp']);
	$passwordlg = $_POST['passphp']; // No hace falta escaparlo

	// Paso1: Buscar usuario por nombre

	if ($sqlnew = $con->prepare("SELECT * FROM usuario WHERE nom_usuario = ?")) {
		$sqlnew->bind_param('s',$usuariolg);
		$sqlnew->execute();
		$resultado = $sqlnew->get_result();

		if ($resultado->num_rows == 1) {
			
			$datos = $resultado->fetch_assoc();

			// Paso 2 : Verificar si esta Activo/Inactivo
			if ((int)$datos['estado_usuario'] !== 1) {
				echo json_encode(['error' => true, 'mensaje' => 'El usuario esta inactivo']);
				exit;
			}

			// Paso 2: Verificar la contraseña
			if (password_verify($passwordlg,$datos['pass_usuario'])) {
				$_SESSION['loginUser'] = $datos;
				echo json_encode(['error' => false, 'usuario' => $datos['nom_usuario'], 'rol' => $datos['id_rol']]);
				exit;
			} else {
				echo json_encode(['error' => true, 'mensaje' => 'Contraseña incorrecta']);
			}
		} else {
			echo json_encode(['error' => true, 'mensaje' => 'Usuario no encontrado']);
		}
		$sqlnew->close();
	}
	$con->close();
}
?>
