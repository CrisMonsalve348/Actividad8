<?php
require_once("config.php");
session_start();
// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
// Agregar producto al carrito
if (isset($_POST['agregar_carrito'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    // Verificar stock disponible
    $sql = "SELECT stock, precio, nombre FROM productos WHERE id = $producto_id";
    $resultado = $conexion->query($sql);
    $producto = $resultado->fetch_assoc();
    if ($producto['stock'] >= $cantidad) {
        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad'] += $cantidad;
        } else {
            $_SESSION['carrito'][$producto_id] = array(
                'nombre' => $producto['nombre'],
                'cantidad' => $cantidad,
                'precio' => $producto['precio']
            );
        }
        $_SESSION['mensaje'] = "¡Producto agregado al carrito exitosamente!";
        $_SESSION['mensaje_tipo'] = "success";
    } else {
        $_SESSION['mensaje'] = "Stock insuficiente";
        $_SESSION['mensaje_tipo'] = "error";
    }
    header("Location: ../index_usuario.php");
    exit();
}
// Eliminar producto del carrito
if (isset($_POST['eliminar_producto'])) {
    $producto_id = $_POST['producto_id'];
    unset($_SESSION['carrito'][$producto_id]);
    $_SESSION['mensaje'] = "Producto eliminado del carrito";
    $_SESSION['mensaje_tipo'] = "success";
    header("Location: ../carrito_vista.php");
    exit();
}
?>