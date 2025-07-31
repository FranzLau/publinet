<?php
	require '../../../config/conexion.php';
	$idCategoria =$_POST['idEditarCategoria'];
	$nomCategoriaActual = $_POST['nomEditarCategoria'];
	$descCategoriaActual = $_POST['descEditarCategoria'];

	$upd = $con->query("UPDATE categoria SET nom_categoria = '$nomCategoriaActual',
											desc_categoria = '$descCategoriaActual' 
									WHERE id_categoria= '$idCategoria' ");
	if ($upd) {
			echo json_encode(array('error' => false));
		}else{
			echo json_encode(array('error' => true));
		}

$con->close();
?>
