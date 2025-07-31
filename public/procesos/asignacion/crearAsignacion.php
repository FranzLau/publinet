<?php
    session_start();
    require '../../../config/conexion.php';
	require '../../../config/clases.php';

    $obj = new move();

    if(count($_SESSION['tablaEquipoTemp']) == 0){
        echo 0;
    }else {
        $result=$obj->asignarEquipos();
        unset($_SESSION['tablaEquipoTemp']);
        echo $result;
    }
?>