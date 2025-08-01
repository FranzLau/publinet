<?php
require '../../../config/conexion.php';
session_start();

$usuarioId = $_SESSION['loginUser']['id_usuario']; // o tu variable de sesión
$montoInicial = floatval($_POST['montoInicialCaja'] ?? 0);
$fechaApertura = date('Y-m-d H:i:s');
$estadoCaja = 'Abierto';

// Verificar si ya hay una caja abierta
$stmt = $con->prepare("SELECT id_caja FROM caja WHERE estado_caja = ? LIMIT 1");
$stmt->bind_param("s", $estadoCaja);
$stmt->execute();
$verificar = $stmt->get_result();

if ($verificar && $verificar->num_rows > 0) {
    echo json_encode(['error' => true, 'mensaje' => 'Ya hay una caja abierta']);
    exit;
}

// Insertar apertura
$stmt = $con->prepare("INSERT INTO caja (id_usuario, fecha_apertura, monto_inicial, estado_caja) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isds", $usuarioId, $fechaApertura, $montoInicial, $estadoCaja);

if ($stmt->execute()) {
    echo json_encode(['error' => false, 'mensaje' => 'Caja abierta correctamente']);
} else {
    echo json_encode(['error' => true, 'mensaje' => 'Error al abrir la caja']);
}

$stmt->close();
$con->close();
?>