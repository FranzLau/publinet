<?php
/**
 *
 */
class crud
{
    //------------------------------CRUD PARA EMPLEADO---------------------
    public function leerDatosEmpleado($idemp){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM empleado WHERE id_emp = '$idemp' ");
        $ver = $sql->fetch_row();
        $datos = array('idempphp'=>$ver[0],
                        'cargoempphp'=>$ver[1],
                        'nomempphp'=>$ver[2],
                        'apempphp'=>$ver[3],
                        'dniempphp'=>$ver[4],
                        'telempphp'=>$ver[5]);
        return $datos;
	}
    public function eliminarEmpleado($idemp){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM empleado WHERE id_emp = '$idemp' ");
		return $sql;
	}

    //------------------------ PARA CATEGORIAS CONTROL ------------------------------

    public function leerDatosCategoria($idcateg){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM categoria WHERE id_categoria = '$idcateg' ");
        $dataCategoria = $sql->fetch_row();
        $datos = array('idCategoria' => $dataCategoria[0],
                        'nomCategoria'=>$dataCategoria[1],
                        'descCategoria'=>$dataCategoria[2]);
        return $datos;
    }

    public function eliminarCategoria($idcateg){
        require 'conexion.php';
        $sql = $con->query("DELETE FROM categoria WHERE id_categoria = '$idcateg' ");
        return $sql;
    }

    //------------------------ Para Usuario PUBLIGRAFF ------------------------------

    public function leerDatosUsuario($iduser){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM usuario WHERE id_usuario = '$iduser' ");
        $dataUusuario = $sql->fetch_row();
        $datos = array('idUsuario' => $dataUusuario[0],
                        'idRol'=>$dataUusuario[1],
                        'idEmp'=>$dataUusuario[2],
                        'nomUsuario'=>$dataUusuario[3],
                        'estUsuario'=>$dataUusuario[5]);
        return $datos;
    }

    public function eliminarContrato($idcontr){
        require 'conexion.php';
        $sql = $con->query("DELETE FROM contrato WHERE id_contrato = '$idcontr' ");
        return $sql;
    }

    //------------------------ PARA PRODUCTOS CONTROL ------------------------------

    public function datosProductos($idprod){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM producto WHERE id_prod = '$idprod' ");
        $dataProducto = $sql->fetch_row();
        $datos = array('idProducto' => $dataProducto[0],
                        'idCategoria'=>$dataProducto[1],
                        'nomProd'=>$dataProducto[2],
                        'serieProd'=>$dataProducto[3],
                        'marcaProd'=>$dataProducto[4],
                        'modeloProd'=>$dataProducto[5],
                        'cantProd'=>$dataProducto[6],
                        'estadoProd'=>$dataProducto[7],
                        'precmProd'=>$dataProducto[8],
                        'precpProd'=>$dataProducto[9],
                        'precgProd'=>$dataProducto[10],
                        'fechaCaptura'=>$dataProducto[11]);
    return $datos;
    }

    public function eliminarProducto($idprod){
        require 'conexion.php';
        $sql = $con->query("DELETE FROM producto WHERE id_prod = '$idprod' ");
        return $sql;
    }

    //------------------------ PARA SEDES CONTROL ------------------------------
    public function leerDatosSede($idsede){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM sede WHERE id_sede = '$idsede' ");
        $dataSede = $sql->fetch_row();
        $datos = array('idSede' => $dataSede[0],
                        'nomSede' => $dataSede[1],
                        'direccionSede' => $dataSede[2],
                        'ciudadSede'=>$dataSede[3]);
        return $datos;
    }
    public function eliminarDatosSede($idsede){
        require 'conexion.php';
        $sql = $con->query("DELETE FROM sede WHERE id_sede = '$idsede' ");
        return $sql;
    }

    //------------------------ PARA CARGOS CONTROL ------------------------------
    public function leerDatosCargo($idcarg){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM cargo WHERE id_cargo = '$idcarg' ");
        $dataCargo = $sql->fetch_row();
        $datos = array('idCargo' => $dataCargo[0],
                        'nomCargo'=>$dataCargo[1]);
        return $datos;
    }
    public function eliminarDatoCargo($idcarg){
        require 'conexion.php';
        $sql = $con->query("DELETE FROM cargo WHERE id_cargo = '$idcarg' ");
        return $sql;
    }

   

    //------------------------ PARA GERENCIA CONTROL ------------------------------
    public function leerDatosGeren($idgeren){
        require 'conexion.php';
        $sql = $con->query("SELECT * FROM gerencia WHERE id_gerencia = '$idgeren' ");
        $dataGeren = $sql->fetch_row();
        $datos = array('idGeren' => $dataGeren[0],
                        'nomGeren'=>$dataGeren[1]);
        return $datos;
    }
    public function eliminarDatoGeren($idgeren){
        require 'conexion.php';
        $sql = $con->query("DELETE FROM gerencia WHERE id_gerencia = '$idgeren' ");
        return $sql;
    }

}
?>
