<?php
// Incluye el archivo de configuración y inicia la sesión
require_once "config.php";
session_start();

// Verifica si la petición es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene y sanitiza los datos del formulario
    $usuario_id = $_POST['usuario_id'];
    $provincia = $conexion->real_escape_string($_POST['provincia']);
    $localidad = $conexion->real_escape_string($_POST['localidad']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $coste = $_POST['coste'];
    // Obtiene la fecha y hora actual
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');

    // Prepara la consulta SQL para insertar el nuevo pedido
    $sql = "INSERT INTO pedidos (usuario_id, provincia, localidad, direccion, coste, estado, fecha, hora) 
            VALUES ('$usuario_id', '$provincia', '$localidad', '$direccion', '$coste', 'pendiente', '$fecha', '$hora')";

    // Ejecuta la consulta y verifica si fue exitosa
    if ($conexion->query($sql)) {
        // Limpiar el carrito después de realizar el pedido
        unset($_SESSION['carrito']);
        $_SESSION['mensaje'] = "¡Pedido realizado con éxito!";
        $_SESSION['mensaje_tipo'] = "success";
        header("Location: index_usuario.php");
    } else {
        // Si hay error, establece mensaje de error
        $_SESSION['mensaje'] = "Error al procesar el pedido";
        $_SESSION['mensaje_tipo'] = "error";
        header("Location: realizar_pedido.php");
    }
}
?>