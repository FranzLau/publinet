<?php
	require '../../../config/conexion.php';

	$idEmpUpdate = $_POST['idEditarEmpleado'] ?? 0;
	$cargoEmpUpdate = $_POST['cargoEditarEmpleado'];
	$nomEmpUpdate = $_POST['nomEditarEmpleado'];
	$apeEmpUpdate = $_POST['apeEditarEmpleado'];
	$dniEmpUpdate = $_POST['dniEditarEmpleado'];
	$telEmpUpdate = $_POST['telEditarEmpleado'];

	// Verificamos si el empleado ya existe con el Dni
	$verificar = $con->prepare("SELECT 1 FROM empleado WHERE dni_emp = ? AND id_emp != ?");
	$verificar->bind_param("si", $dniEmpUpdate, $idEmpUpdate);
	$verificar->execute();
	$verificar->store_result();

	if ($verificar->num_rows > 0) {
		echo json_encode(['error' => true, 'mensaje' => 'Ya existe un empleado con ese Documento']);
		$verificar->close();
		exit;
	}
	$verificar->close();

	// 1. Actualizar empleado
	$update = $con->prepare("UPDATE empleado SET id_cargo = ?, nom_emp = ?, ape_emp = ?, dni_emp = ?, telefono_emp = ? WHERE id_emp = ?");
	$update->bind_param("issssi",$cargoEmpUpdate,$nomEmpUpdate,$apeEmpUpdate,$dniEmpUpdate,$telEmpUpdate,$idEmpUpdate); 

	if (!$update->execute()) {
		// Si hubo un error al ejecutar la consulta, muestra un mensaje de error
		echo json_encode(['error' => true, 'mensaje' => 'Error al actualizar Empleado']);
		exit; 
	}

	// Empleado actualziado correctamente.
	echo json_encode(['error' => false, 'mensaje' => 'Empleado actualizado correctamente']); 
	$con->close();
 ?>
