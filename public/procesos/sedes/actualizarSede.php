<?php
	require '../../../config/conexion.php';
	$idSede =$_POST['idEditarSede'];
	$nomSede = $_POST['nomEditarSede'];
    $ciudadSede = $_POST['ciudadEditarSede'];
    $dirSede = $_POST['dirEditarSede'];

	$upd = $con->query("UPDATE sede SET nom_sede='$nomSede',
                                        direccion_sede = '$dirSede',
                                        ciudad_sede = '$ciudadSede'
                                    WHERE id_sede = '$idSede' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}

$con->close();
?>