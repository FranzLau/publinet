<?php
	require '../../../config/conexion.php';
	
	$nomEmpReg = $_POST['nombreEmpleado'];
	$apeEmpReg = $_POST['apellidoEmpleado'];
	$dniEmpReg = $_POST['dniEmpleado'];
	$telEmpReg = $_POST['telEmpleado'];
	$carEmpReg = (int) $_POST['cargoEmpleado'];

	// Validamos campos obligatorios
	if ($dniEmpReg === '') {
		echo json_encode(['error' => true, 'mensaje' => 'El DNI es obligatorio']);
		exit; 
	}

	// Verificamos si el empleado ya existe con el Dni
	$verificar = $con->prepare("SELECT 1 FROM empleado WHERE dni_emp = ?");
	$verificar->bind_param("s", $dniEmpReg);
	$verificar->execute();
	$verificar->store_result();

	if ($verificar->num_rows > 0) {
		echo json_encode(['error' => true, 'mensaje' => 'Ya existe un empleado con ese Documento']);
		$verificar->close();
		exit;
	}
	$verificar->close();

	// Insertamos nuevo empleado
	$stmt = $con->prepare("INSERT INTO empleado (id_cargo,nom_emp,ape_emp,dni_emp,telefono_emp) VALUES (?,?,?,?,?)");

	if (!$stmt) {
		echo json_encode(['error' => true, 'mensaje' => 'Error al preparar la consulta']);
		exit; 
	}

	$stmt->bind_param("issss", $carEmpReg,$nomEmpReg,$apeEmpReg,$dniEmpReg,$telEmpReg);

	if ($stmt->execute()) {
		echo json_encode(['error' => false, 'mensaje' => 'Empleado registrado correctamente']);
	} else {
		echo json_encode(['error' => true, 'mensaje' => 'Error al registrar empleado']);
	}
	
	$stmt->close();
	$con->close();
 ?>
