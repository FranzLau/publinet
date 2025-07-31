<?php
	session_start();
	require '../../../config/conexion.php';

	$idnDesMoviAsig=$_POST['empNewAsig'];//ID_Destino
	$sedeMoviAsig=$_POST['sedeNewAsig'];//Sede
  $operMoviAsig=$_POST['opeNewAsig'];//Operador
  $detaMoviAsig=$_POST['detNewAsig'];//Detalles

	$ideqMoviAsig=$_POST['serieNewAsig'];//ID_equipo
  $cantMoviAsig=$_POST['cantNewAsig'];//cantidad
  $hostMoviAsig=$_POST['labelNewAsig'];//hostname
	

  // Obtenemos el nombre del Destino --------------
	$sql=$con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp= '$idnDesMoviAsig' ");
	$d = $sql->fetch_row();
	$nomDestAsig = $d[1]." ".$d[0];

  // Obtenemos los datos del Equipo ---------------
	$sql=$con->query("SELECT * FROM equipo WHERE id_equipo = '$ideqMoviAsig' ");
	$rowequipo = $sql->fetch_row();


	$idCategoriaEq = $rowequipo[1];
	$idContratoEq = $rowequipo[2];
  $nomEquipoEq = $rowequipo[3];
	$tcodEquipoEq = $rowequipo[4];
	$codEquipoEq = $rowequipo[5];
  $serieEquipoEq = $rowequipo[7];
  $marcaEquipoEq = $rowequipo[8];
  $cantidEquipoEq = $rowequipo[10];
  $estadoEquipoEq = $rowequipo[12];


  // Guardar datos en la variable articulo
	$asignacion = $idnDesMoviAsig."||".
                $nomDestAsig."||".
                $sedeMoviAsig."||".
                $operMoviAsig."||".
                $detaMoviAsig."||".
                $ideqMoviAsig."||".
                $serieEquipoEq."||".
                $cantMoviAsig."||".
                $hostMoviAsig."||".
                $nomEquipoEq."||".
                $marcaEquipoEq."||".
                $tcodEquipoEq."||".
                $codEquipoEq;

  // Condicinal para validar
  if ($cantMoviAsig == 0) {
    echo 2;
  }else {
    if ($cantMoviAsig <= $cantidEquipoEq) {
      $_SESSION['tablaEquipoTemp'][]=$asignacion;
    }else {
      echo 1;
    }
  }

 ?>