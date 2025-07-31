<?php
    session_start();
    $index=$_POST['ind'];
    unset($_SESSION['tablaEquipoTemp'][$index]);
    $datos=array_values($_SESSION['tablaEquipoTemp']);
    unset($_SESSION['tablaEquipoTemp']);
    $_SESSION['tablaEquipoTemp']=$datos;
?>