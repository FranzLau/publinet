<?php
	require '../../../config/conexion.php';
	$id_carg =$_POST['idEdCargo'];
	$nom_carg = $_POST['nomEdCargo'];

	$upd = $con->query("UPDATE cargo SET nom_cargo='$nom_carg'
                                    WHERE id_cargo = '$id_carg' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}

$con->close();
?>