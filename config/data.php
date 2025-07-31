<?php
/**
 *
 */
class data
{
    public function nomCategoria($idcateg){
		require 'conexion.php';
		$sql = $con->query("SELECT nom_categoria FROM categoria WHERE id_categoria = '$idcateg' ");
		$result = $sql->fetch_row();
		return $result[0];
	}

    public function nomRol($idrol){
		require 'conexion.php';
		$sql = $con->query("SELECT nom_rol FROM rol WHERE id_rol = '$idrol' ");
		$result = $sql->fetch_row();
		return $result[0];
	}

	public function nomCargo($idcargo){
		require 'conexion.php';
		$sql = $con->query("SELECT nom_cargo FROM cargo WHERE id_cargo = '$idcargo' ");
		$result = $sql->fetch_row();
		return $result[0];
	}

	public function nomSede($idsede){
		require 'conexion.php';
		$sql = $con->query("SELECT nom_sede FROM sede WHERE id_sede = '$idsede' ");
		$result = $sql->fetch_row();
		return $result[0];
	}

	public function nomEmp($idemp){
		require 'conexion.php';
		$sql = $con->query("SELECT nom_emp,ape_emp FROM empleado WHERE id_emp = '$idemp' ");
		$result = $sql->fetch_row();
		return $result[0]." ".$result[1];
	}

	public function nomUsuario($iduser){
		require 'conexion.php';
		$sql = $con->query("SELECT nom_usuario FROM usuario WHERE id_usuario = '$iduser' ");
		$result = $sql->fetch_row();
		return $result[0];
	}

}

?>