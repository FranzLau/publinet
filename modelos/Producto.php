<?php
class Producto {
    private $con;

    public function __construct($conexion){
        $this->con = $conexion;
    }

    public function agregarProducto($datos, $archivoImagen) {
        $fechaCaptura = date('Y-m-d');
        $idImagen = null;

        // Validaciones mínimas (también las deberías hacer antes en el controlador)
        if (empty($datos['nom_prod']) || empty($datos['descripcion_prod']) || $datos['precio_equipo'] <= 0 || $datos['stock_prod'] < 0 || $datos['id_categoria'] <= 0) {
            return ['error' => true, 'mensaje' => 'Datos inválidos o incompletos'];
        }

        // Verificar que no exista otro producto con el mismo modelo (excepto el actual)
        $stmtCheck = $this->con->prepare("SELECT 1 FROM producto WHERE modelo_prod = ?");
        $stmtCheck->bind_param("s", $datos['modelo_prod']);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        if ($stmtCheck->num_rows > 0) {
            return ['error' => true, 'mensaje' => 'Ya existe otro producto con ese modelo'];
            $stmtCheck->close();
            exit;
        }
        $stmtCheck->close();

        // ------------------------------------
        // SUBIDA DE IMAGEN Y REGISTRO EN TABLA IMAGEN
        // ------------------------------------
        $idImagen = null;

        if (isset($archivoImagen) && $archivoImagen['error'] === 0) {
            $nombreArchivo = basename($archivoImagen['name']);
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            $nombreUnico = uniqid('img_', true) . '.' . $extension;
            $rutaDestino = '../../../uploads/' . $nombreUnico;

            if (!is_dir('../../../uploads/')) {
                mkdir('../../../uploads/', 0755, true);
            }

            if (move_uploaded_file($archivoImagen['tmp_name'], $rutaDestino)) {
                $rutaBD = 'uploads/' . $nombreUnico; // ruta relativa para guardar en BD

                $stmtImg = $this->con->prepare("INSERT INTO imagen (nombre_imagen, ruta_imagen, fecha_subida) VALUES (?, ?, ?)");
                $stmtImg->bind_param("sss", $nombreArchivo, $rutaBD, $fechaCaptura);
                if ($stmtImg->execute()) {
                    $idImagen = $stmtImg->insert_id;
                } else {
                    return ['error' => true, 'mensaje' => 'Error al guardar imagen'];
                    exit;
                }
                $stmtImg->close();
            } else {
                return ['error' => true, 'mensaje' => 'No se pudo subir la imagen'];
                exit;
            }
        }

        // Preparar la consulta para INSERTAR PRODUCTO
        $stmc = $this->con->prepare("INSERT INTO producto (id_categoria,id_imagen,nom_prod,descripcion_prod,marca_prod,modelo_prod,stock_prod,precio_equipo,precio_full,fecha_captura) VALUES (?,?,?,?,?,?,?,?,?,?)");

        if (!$stmc) {
            return ['error' => true, 'mensaje' => 'Error al preparar consulta'];
            exit;
        }

        $stmc->bind_param(
            "iissssidds",
            $datos['id_categoria'],
            $idImagen,
            $datos['nom_prod'],
            $datos['descripcion_prod'],
            $datos['marca_prod'],
            $datos['modelo_prod'],
            $datos['stock_prod'],
            $datos['precio_equipo'],
            $datos['precio_full'],
            $fechaCaptura
        );

        if ($stmc->execute()) {
            return ['error' => false, 'mensaje' => 'Producto registrado correctamente'];
        } else {
            return ['error' => true, 'mensaje' => 'Error al registrar el producto'];
        }

    }

    public function editarProducto($idProducto, $datos, $archivoImagen = null){

        if ($idProducto <= 0 || empty($datos['nom_prod']) || empty($datos['descripcion_prod']) || $datos['precio_equipo'] <= 0 ||  $datos['stock_prod'] < 0 || $datos['id_categoria'] <= 0) {
            return ['error' => true, 'mensaje' => 'Datos inválidos o incompletos'];
        }

        // VERIFICAR
        // verificamos que el modelo de producto ya exista
        $verificar = $this->con->prepare("SELECT 1 FROM producto WHERE modelo_prod = ? AND id_prod != ?");
        $verificar->bind_param("si", $datos['modelo_prod'], $idProducto);
        $verificar->execute();
        $verificar->store_result();

        if ($verificar->num_rows > 0) {
            return ['error' => true, 'mensaje' => 'Ya existe un producto de ese Modelo'];
            $verificar->close();
            exit;
        }
        $verificar->close();

        //PROCESAR IMAGEN
        // Verificar si se subió una nueva imagen
        
        $idImagenNueva = null;

        if ($archivoImagen && $archivoImagen['error'] === 0) {
            // Carpeta de destino
            
            $nombreOriginal = basename($archivoImagen['name']);
            $ext = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
            $nombreUnico = uniqid('img_', true) . '.' . $ext;
            $rutaFinal = '../../../uploads/' . $nombreUnico;

            if (!is_dir('../../../uploads/')) {
                mkdir('../../../uploads/', 0755, true);
            }

            // Mover archivo
            if (move_uploaded_file($archivoImagen['tmp_name'], $rutaFinal)) {
                // Guardar en la tabla imagen
                $fechaSubida = date('Y-m-d');
                $rutaBD = 'uploads/' . $nombreUnico;

                $insertImg = $this->con->prepare("INSERT INTO imagen (nombre_imagen, ruta_imagen, fecha_subida) VALUES (?, ?, ?)");
                $insertImg->bind_param("sss", $nombreOriginal, $rutaBD, $fechaSubida);

                if ($insertImg->execute()) {
                    $idImagenNueva = $insertImg->insert_id;
                } else {
                    return ['error' => true, 'mensaje' => 'Error al guardar nueva imagen'];
                    exit;
                }
            } else {
                return ['error' => true, 'mensaje' => 'No se pudo mover la imagen al servidor'];
                exit;
            }
        }
        // Construcción dinámica de consulta UPDATE
        if ($idImagenNueva !== null) {
            $update = $this->con->prepare("UPDATE producto SET id_categoria = ?, id_imagen = ?, nom_prod = ?, descripcion_prod = ?, marca_prod = ?, modelo_prod = ?, stock_prod = ?, precio_equipo = ?, precio_full = ? WHERE id_prod = ?");
            
            $update->bind_param(
                "iissssiddi", 
                $datos['id_categoria'], 
                $idImagenNueva, 
                $datos['nom_prod'], 
                $datos['descripcion_prod'], 
                $datos['marca_prod'], 
                $datos['modelo_prod'], 
                $datos['stock_prod'], 
                $datos['precio_equipo'], 
                $datos['precio_full'], 
                $idProducto
            );
        } else {
            $update = $this->con->prepare("UPDATE producto SET id_categoria = ?, nom_prod = ?, descripcion_prod = ?, marca_prod = ?, modelo_prod = ?, stock_prod = ?, precio_equipo = ?, precio_full = ? WHERE id_prod = ?");
            
            $update->bind_param(
                "issssiddi", 
                $datos['id_categoria'], 
                $datos['nom_prod'], 
                $datos['descripcion_prod'], 
                $datos['marca_prod'], 
                $datos['modelo_prod'], 
                $datos['stock_prod'], 
                $datos['precio_equipo'], 
                $datos['precio_full'], 
                $idProducto
            );
        }

        if ($update->execute()) {
            return ['error' => false, 'mensaje' => 'Producto actualizado correctamente'];
            exit;
        } else {
            return ['error' => true, 'mensaje' => 'Error al actualizar Producto'];
            exit;
        }

    }

    public function obtenerProducto($idProducto){
        
        $consulta = $this->con->prepare("SELECT p.*, i.ruta_imagen AS ruta_imagen FROM producto p LEFT JOIN imagen i ON p.id_imagen = i.id_imagen WHERE p.id_prod = ? ");

        $consulta->bind_param("i", $idProducto);
        $consulta->execute();
        $result = $consulta->get_result();

        if ($result->num_rows === 1) {
            
            return $result->fetch_assoc();
            
        } else {
            return null;
        }
    }

    public function eliminarProducto($idProducto){

        // Primero, verifica si el producto existe y si tiene una imagen asociada
        $stmtVerificar = $this->con->prepare("SELECT id_imagen FROM producto WHERE id_prod = ?");
        $stmtVerificar->bind_param("i", $idProducto);
        $stmtVerificar->execute();
        $resultado = $stmtVerificar->get_result();

        if ($resultado->num_rows === 0) {
            return ['error' => true, 'mensaje' => 'Producto no encontrado'];
        }

        $producto = $resultado->fetch_assoc();
        $idImagen = $producto['id_imagen'];
        $stmtVerificar->close();

        // Eliminar el producto
        $stmtEliminar = $this->con->prepare("DELETE FROM producto WHERE id_prod = ?");
        $stmtEliminar->bind_param("i", $idProducto);

        if ($stmtEliminar->execute()) {
            $stmtEliminar->close();

            // Si hay imagen asociada, la eliminamos también
            if ($idImagen) {
                $stmtImg = $this->con->prepare("SELECT ruta_imagen FROM imagen WHERE id_imagen = ?");
                $stmtImg->bind_param("i", $idImagen);
                $stmtImg->execute();
                $resImg = $stmtImg->get_result();

                if ($resImg->num_rows === 1) {
                    $img = $resImg->fetch_assoc();
                    $ruta = '../../../' . $img['ruta_imagen'];

                    // Eliminar archivo físico si existe
                    if (file_exists($ruta)) {
                        unlink($ruta);
                    }

                    // Eliminar el registro de la imagen
                    $stmtDelImg = $this->con->prepare("DELETE FROM imagen WHERE id_imagen = ?");
                    $stmtDelImg->bind_param("i", $idImagen);
                    $stmtDelImg->execute();
                    $stmtDelImg->close();
                }
                $stmtImg->close();
            }

            return ['error' => false, 'mensaje' => 'Producto eliminado correctamente'];
        } else {
            return ['error' => true, 'mensaje' => 'Error al eliminar el producto'];
        }
    }
}
?>