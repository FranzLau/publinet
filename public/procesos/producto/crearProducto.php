<?php
	require '../../../config/conexion.php';

	$idCategoria = $_POST['addCategProd'] ?? null;
	$nombProducto = trim($_POST['addNomProd'] ?? '');
	$descProducto = trim($_POST['descProd'] ?? '');
	$marcaProducto = trim($_POST['addMarcaProd'] ?? '');
	$modeloProducto = trim($_POST['addModeloProd'] ?? '');
	$stockProducto = intval($_POST['addStockProd'] ?? 0);
	$precioEquipoProducto = floatval($_POST['addPrecEqProd'] ?? 0);
	$precioFullProducto = floatval($_POST['addPrecioFullProd'] ?? 0);
	$fechaCaptura = date('Y-m-d');

	if ($nombProducto === '' || $descProducto === '' || $precioEquipoProducto <= 0 || $stockProducto < 0 || $idCategoria <= 0) {
		echo json_encode(['error' => true, 'mensaje' => 'Datos invalidos o incompletos']);
		exit;
	}

	// Verificar que no exista otro producto con el mismo modelo (excepto el actual)
	$stmtCheck = $con->prepare("SELECT 1 FROM producto WHERE modelo_prod = ?");
	$stmtCheck->bind_param("s", $modeloProducto);
	$stmtCheck->execute();
	$stmtCheck->store_result();

	if ($stmtCheck->num_rows > 0) {
		echo json_encode(['error' => true, 'mensaje' => 'Ya existe otro producto con ese modelo']);
		$stmtCheck->close();
		exit;
	}
	$stmtCheck->close();

	// Subida de imagen
	$rutaImagen = null;

	if (isset($_FILES['addImagen']) && $_FILES['addImagen']['error'] === 0) {

		$tmpName = $_FILES['addImagen']['tmp_name'];
		$originalName = basename($_FILES['addImagen']['name']);
		$ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
		$permitidas = ['jpg', 'jpeg', 'png', 'webp'];

		if (!in_array($ext, $permitidas)) {
			echo json_encode(['error' => true, 'mensaje' => 'Formato de imagen no permitido']);
			exit;
		}

		if ($_FILES['addImagen']['size'] > 2 * 1024 * 1024) {
			echo json_encode(['error' => true, 'mensaje' => 'La imagen excede los 2MB']);
			exit;
		}

		$nuevoNombre = uniqid('img_') . '.' . $ext;
		$directorioDestino = '../../uploads/';
		$rutaServidor = $directorioDestino . $nuevoNombre;

		if (!is_dir($directorioDestino)) {
			mkdir($directorioDestino, 0755, true);
		}

		if (!move_uploaded_file($tmpName, $rutaServidor)) {
			echo json_encode(['error' => true, 'mensaje' => 'Error al guardar la imagen']);
			exit;
		}

		$rutaImagen = 'uploads/' . $nuevoNombre; // Esta se guarda en la BD
	}

	// Preparar la consulta
	$stmc = $con->prepare("INSERT INTO producto (id_categoria,nom_prod,descripcion_prod,marca_prod,modelo_prod,stock_prod,precio_equipo,precio_full,imagen_prod,fecha_captura) VALUES (?,?,?,?,?,?,?,?,?,?)");

	if (!$stmc) {
		echo json_encode(['error' => true, 'mensaje' => 'Error al preparar consulta']);
		exit;
	}

	$stmc->bind_param("issssiddss",$idCategoria,$nombProducto,$descProducto,$marcaProducto,$modeloProducto,$stockProducto,$precioEquipoProducto,$precioFullProducto,$rutaImagen,$fechaCaptura);

	if ($stmc->execute()) {
		echo json_encode(['error' => false, 'mensaje' => 'Producto registrado correctamente']);
	} else {
		echo json_encode(['error' => true, 'mensaje' => 'Error al registrar el producto']);
	}

	$stmc->close();
	$con->close();
?>
