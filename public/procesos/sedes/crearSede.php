<?php
	require '../../../config/conexion.php';
	$nomSede = $_POST['nomNuevaSede'];
    $ciudadSede = $_POST['ciudadNuevaSede'];
    $dirSede = $_POST['dirNuevaSede'];

	$query = $con->query("SELECT nom_sede FROM sede WHERE nom_sede LIKE '". $nomSede ."' ");
	$sede = $query->num_rows;

	if ($sede === 1) {
		echo 0;
	}else{
		$res = $con->query("INSERT INTO sede (nom_sede,direccion_sede,ciudad_sede) VALUES ('$nomSede','$dirSede','$ciudadSede')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}


$con->close();
?>