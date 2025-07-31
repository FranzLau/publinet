<?php

class move 
{
    
    //------------------------ PARA asignacion 2023 ------------------------------
    public function asignarEquipos(){
        require 'conexion.php';

        $fecha=date('Y-m-d');
        $idasig=self::crearFolio();
        $datos = $_SESSION['tablaEquipoTemp'];
        $iduser = $_SESSION['loginUser']['id_usuario'];
        $tipomov = 'ASIGNACION';
        $bandera='YES';
        $r=0;

        for ($i=0; $i<count($datos); $i++){
            $d=explode("||", $datos[$i]);

            $sql = $con->query("INSERT INTO movimiento (id_mov,
                                                            id_usuario,
                                                            id_emp,
                                                            id_sede,
                                                            id_equipo,
                                                            cantidad_equipo,
                                                            fecha_mov,
                                                            tipo_mov,
                                                            bandera_mov,
                                                            detalles_mov,
                                                            grupo_mov,
                                                            etiqueta_mov) 
                                                    VALUES ('$idasig',
                                                            '$iduser',
                                                            '$d[0]',
                                                            '$d[2]',
                                                            '$d[5]',
                                                            '$d[7]',
                                                            '$fecha',
                                                            '$tipomov',
                                                            '$bandera',
                                                            '$d[4]',
                                                            '$d[3]',
                                                            '$d[8]')");
                                                                    
            $r = $r + $sql;
            self::actualizarStock($d[5],$d[7]);
            self::actualizarEstado($d[5]);
        }
        return $r;
    }
    
    public function crearFolio(){
		require 'conexion.php';
		$sql = $con->query("SELECT id_mov FROM movimiento GROUP BY id_mov ORDER BY id_mov DESC");
		$result = $sql->fetch_row();
		$id = $result[0];
		if ($id=="" or $id==null or $id==0) {
			return 1;
		}else{
			return $id + 1;
		}
	}

    public function actualizarStock($ideq,$cant){
        require 'conexion.php';
        $sql = $con->query("SELECT cantidad_equipo FROM equipo WHERE id_equipo='$ideq' ");
        $result = $sql->fetch_row();
        $stockProd = $result[0];
        //Actualizar
        $newStock = abs($stockProd - $cant);
        $sql = $con->query("UPDATE equipo SET cantidad_equipo='$newStock' WHERE id_equipo='$ideq' ");
    }

    public function actualizarEstado($ideq){
        require 'conexion.php';
        $sql = $con->query("SELECT estado_equipo FROM equipo WHERE id_equipo='$ideq' ");
        $result = $sql->fetch_row();
        $estadoEq = $result[0];
        //Actualizar
        $newEstadoEq = "ND";
        $sql = $con->query("UPDATE equipo SET estado_equipo='$newEstadoEq' WHERE id_equipo='$ideq' ");
    }

   


}

?>