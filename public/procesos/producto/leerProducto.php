<?php
	require '../../../config/conexion.php';
	
	$idprod = $_POST['id_prod'] ?? 0;

	$consulta = $con->prepare("SELECT * FROM producto WHERE id_prod = ?");
	$consulta->bind_param("i", $idprod);
	$consulta->execute();
	$result = $consulta->get_result();

	if ($result->num_rows === 1) {
		$producto = $result->fetch_assoc();
		echo json_encode(['error' => false, 'datos' => $producto]);
	} else {
		echo json_encode(['error' => true, 'mensaje' => 'Empleado no encontrado']);
	}
 ?>
