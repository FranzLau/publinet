<?php
    session_start();
    date_default_timezone_set('America/Lima');

    // Validar si hay una sesión activa
    if (!isset($_SESSION['loginUser'])) {
        // Redirige al login si no hay sesión
        // header('Location: ../../');
        header('Location: ../../index.php'); // Ajusta la ruta si es necesario
        exit;
    }

    // Obtener datos del usuario
    $usuario = $_SESSION['loginUser']['nom_usuario'] ?? 'Invitado';
    $rol_id     = $_SESSION['loginUser']['id_rol'] ?? 0;

    // Convertir ID de rol a nombre de rol
    $nombreRol = match($rol_id) {
        1 => 'Super Administrador',
        2 => 'Administrador',
        3 => 'Operador',
        default => 'Invitado'
    };

    // funcion para bloquear acceso si no es Super Admin
    function soloSuperAdmin() {
        if ($_SESSION['loginUser']['id_rol'] !== 1) {
            redirigirSinPermisos();
        }
    }

    // Función para permitir solo Admin y Super Admin
    function soloAdmin() {
        if (!in_array($_SESSION['loginUser']['id_rol'], [1, 2])) {
            redirigirSinPermisos();
        }
    }

    // Función para permitir solo Operador
    function soloOperador() {
        if ($_SESSION['loginUser']['id_rol'] !== 3) {
            redirigirSinPermisos();
        }
    }

    // Redirección genérica por falta de permisos
    function redirigirSinPermisos() {
        echo "<script>
            alert('Acceso denegado: No tienes permisos para ver esta página.');
            window.location.href = 'index.php';
        </script>";
        exit;
    }
?>