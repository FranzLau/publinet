<?php
	require '../../../config/conexion.php';

	$nomCargo = $_POST['nomNuevoCargo'];

	$query = $con->query("SELECT nom_cargo FROM cargo WHERE nom_cargo LIKE '". $nomCargo ."' ");
	$cargos = $query->num_rows;

	if ($cargos === 1) {
		echo 0;
	}else{
		$res = $con->query("INSERT INTO cargo (nom_cargo) VALUES ('$nomCargo')");
		if ($res) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}
	}


$con->close();
?>