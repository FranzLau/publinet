<?php
/**
 *
 */
class crud
{
  //------------------------------CRUD PARA EMPLEADO---------------------
  public function obtenDatosEmple($idemp){
	require 'conexion.php';
	$sql = $con->query("SELECT * FROM empleado WHERE id_emp = '$idemp' ");
	$ver = $sql->fetch_row();
	$datos = array('idempphp'=>$ver[0],
					'nomempphp'=>$ver[1],
					'apempphp'=>$ver[2],
					'estaempphp'=>$ver[3],
					'cargoempphp'=>$ver[4],
          'arempphp'=>$ver[5],
          'grempphp'=>$ver[6],
          'sdempphp'=>$ver[7]);
	return $datos;
	}
  public function deleteEmple($idemp){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM empleado WHERE id_emp = '$idemp' ");
		return $sql;
	}

  //------------------------------CRUD PARA CARGOS --------------------
  public function ReadCargos($idgto){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM cargo WHERE id_cargo= '$idgto' ");
		$ver = $sql->fetch_row();
		$datos = array('idCargo'=>$ver[0],
						'nomCargo'=>$ver[1],
						'desCargo'=>$ver[2]);
		return $datos;
	}
  public function DeleteCargos($idgto){
			require 'conexion.php';
			$sql = $con->query("DELETE FROM cargo WHERE id_cargo = '$idgto' ");
			return $sql;
	}
  //------------------------- CRUD PARA PRODUCTO --------------------------
  public function readDateProd($idprod){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM equipo WHERE id_equipo = '$idprod' ");
		$datoProd = $sql->fetch_row();
		$datos = array('ProdId' => $datoProd[0],
						'ProdSerie'=>$datoProd[1],
						'ProdMarca'=>$datoProd[2],
						'ProdModel'=>$datoProd[3],
						'ProdAf1'=>$datoProd[4],
						'ProdAf2'=>$datoProd[5],
						'ProdDesc'=>$datoProd[6],
						'ProdEsta'=>$datoProd[7],
						'ProdCant'=>$datoProd[8],
            'ProdRAM'=>$datoProd[9],
            'ProdDisk'=>$datoProd[10],
            'ProdCtg'=>$datoProd[11],
						'ProdPst'=>$datoProd[12]);
		return $datos;
	}
  public function deleteProducto($idprod){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM equipo WHERE id_equipo = '$idprod' ");
		return $sql;
	}
  //------------------------- CRUD PARA PROVEEDOR -----------------------
  public function readDatosProveedor($idprov){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM proveedor WHERE id_prov = '$idprov' ");
		$verprov = $sql->fetch_row();
		$datos = array('idprovphp'=>$verprov[0],
							'rsprovphp'=>$verprov[1],
							'scprovphp'=>$verprov[2],
							'tdprovphp'=>$verprov[3],
							'ndprovphp'=>$verprov[4],
							'dirprovphp'=>$verprov[5],
							'fonprovphp'=>$verprov[6],
							'emailprovphp'=>$verprov[7],
							'urlprovphp'=>$verprov[8]);
		return $datos;
	}
  public function deleteProveedor($idprov){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM proveedor WHERE id_prov = '$idprov' ");
		return $sql;
	}
  //------------------------ PARA CLIENTE CRUD ------------------------------
  public function readDataClient($idcli){
		require 'conexion.php';
		$sql = $con->query("SELECT id_cli,nom_cli,ape_cli,tipodoc_cli,numdoc_cli,telef_cli,email_cli FROM client WHERE id_cli='$idcli'");
		$vercli = $sql->fetch_row();
		$datos = array('idcliphp'=> $vercli[0],
        						'nomcliphp'=>$vercli[1],
        						'apecliphp'=>$vercli[2],
        						'tdcliphp'=>$vercli[3],
        						'ndcliphp'=>$vercli[4],
        						'fnocliphp'=>$vercli[5],
        						'mailcliphp'=>$vercli[6]);
		return $datos;
	}
  public function deleteClient($idcli){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM client WHERE id_cli = '$idcli' ");
		return $sql;
	}
  //------------------------ PARA CATEGORIAS CONTROL ------------------------------


  public function readDateCateg($idcateg){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM categoria WHERE id_categoria = '$idcateg' ");
		$dateCateg = $sql->fetch_row();
		$datos = array('idCategory' => $dateCateg[0],
						'nomCategory'=>$dateCateg[1],
						'desCategory'=>$dateCateg[2]);
		return $datos;
	}
  public function deleteCategory($idcateg){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM categoria WHERE id_categoria = '$idcateg' ");
		return $sql;
	}
  //------------------------ PARA AREA SOPORTE CONTROL ------------------------------
  public function readDateArea($idarea){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM area WHERE id_area = '$idarea' ");
		$dateArea = $sql->fetch_row();
		$datos = array('idArea' => $dateArea[0],
						'nomArea'=>$dateArea[1],
						'descArea'=>$dateArea[2]);
		return $datos;
	}

  public function deleteDataArea($idarea){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM area WHERE id_area = '$idarea' ");
		return $sql;
	}

  //------------------------ PARA GERENCIA SOPORTE CONTROL --------------------------------
  public function readDataGerencia($idgerenc){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM gerencia WHERE id_gerencia = '$idgerenc' ");
		$dateGeren = $sql->fetch_row();
		$datos = array('idGerenc' => $dateGeren[0],
						'nomGerenc'=>$dateGeren[1],
						'descGerenc'=>$dateGeren[2]);
		return $datos;
	}

  public function deleteDataGerencia($idgeren){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM gerencia WHERE id_gerencia = '$idgeren' ");
		return $sql;
	}

  //------------------------ PARA SEDES SOPORTE CONTROL --------------------------------
  public function readDataSede($idsede){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM sede WHERE id_sede = '$idsede' ");
		$dateSede = $sql->fetch_row();
		$datos = array('idSedes' => $dateSede[0],
						'nomSedes'=>$dateSede[1],
						'descSedes'=>$dateSede[2]);
		return $datos;
	}

  public function deleteDataSedes($idsede){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM sede WHERE id_sede = '$idsede' ");
		return $sql;
	}

	//------------------------ PARA PRESNTATION SOPORTE CONTROL ------------------------------


	public function readDatePresent($idpret){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM presentacion WHERE id_presentacion = '$idpret' ");
		$datePrest = $sql->fetch_row();
		$datos = array('idPresent' => $datePrest[0],
						'nomPresent'=>$datePrest[1],
						'desPresent'=>$datePrest[2]);
		return $datos;
	}
  public function deletePresentation($idpret){
		require 'conexion.php';
		$sql = $con->query("DELETE FROM presentacion WHERE id_presentacion = '$idpret' ");
		return $sql;
	}
  //------------------------ PARA CAJA CRUD ------------------------------
  public function readDataOpenBox($idbox){
		require 'conexion.php';
		$sql = $con->query("SELECT * FROM caja WHERE id_caja = '$idbox' ");
		$datebox = $sql->fetch_row();
		$datos = array('idOpenbox' => $datebox[0],
						'empleOpenbox'=>$datebox[1],
						'montoOpenbox'=>$datebox[3]);
		return $datos;
	}



  //------------------------ PARA ASIGNACION -- CRUD ------------------------
  public function createFolioAssig(){
		require 'conexion.php';
		$sql = $con->query("SELECT id_asig FROM asignacion GROUP BY id_asig DESC ");
		$result = $sql->fetch_row();
		$id = $result[0];
		if ($id=="" or $id==null or $id==0) {
			return 1;
		}else{
			return $id + 1;
		}
	}

  public function createAssignment(){
		require 'conexion.php';
		//date_default_timezone_set('America/Lima');
		//$dateAssig = date('Y-m-d');
		$empAssig = $_SESSION['loginUser']['id_emp'];
		$idAssig = self::createFolioAssig();
		$datos = $_SESSION['EquipoAssigTemp'];
		$r=0;
		for ($i=0; $i < count($datos) ; $i++) {
			$d=explode("||", $datos[$i]);
			$inserta1 = $con->query("INSERT INTO asignacion (id_asig,
                											fecha_asig,
                											cantidad_asig,
                											responsable_asig,
                                                			elsu_asig,
                                                			ip_asig,
                                                			mac_asig,
                											id_equipo,
                											id_emp,
                                                			id_gerencia,
                                                			id_area)
              									VALUES ('$idAssig',
                  										'$d[0]',
                  										'$d[8]',
                  										'$d[1]',
                  										'$d[13]',
                                      					'$d[14]',
                                      					'$d[15]',
                  										'$d[3]',
                                      					'$empAssig',
                                      					'$d[11]',
                  										'$d[12]') ");
        	if ($inserta1 == true) {
          		$inserta2 = $con->query("INSERT INTO asignacion_temp (id_asig,
                    									fecha_asig,
                    									cantidad_asig,
                    									responsable_asig,
                                                    	elsu_asig,
                                                    	ip_asig,
                                                    	mac_asig,
                    									id_equipo,
                    									id_emp,
                                                    	id_gerencia,
                                                    	id_area)
                  								VALUES ('$idAssig',
                      										'$d[0]',
                      										'$d[8]',
                      										'$d[1]',
                      										'$d[13]',
                                          					'$d[14]',
                                          					'$d[15]',
                      										'$d[3]',
                                          					'$empAssig',
                                          					'$d[11]',
                      										'$d[12]') ");
        	}
			$r = $r + $inserta1;
			self::updateStock($d[3],$d[8]);
      		//self::updateValorAssig($d[2]);
		}
		return $r;
	}

	public function updateStock($idprod,$cant){
			require 'conexion.php';
			$sql = $con->query("SELECT cantidad_equipo FROM equipo WHERE id_equipo='$idprod' ");
			$result = $sql->fetch_row();
			$stockProd = $result[0];
      //Actualizar
      $newStock = abs($stockProd - $cant);
      $sql = $con->query("UPDATE equipo SET cantidad_equipo='$newStock' WHERE id_equipo='$idprod' ");
	}

  



}
?>
