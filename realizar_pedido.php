<?php
// Incluye el archivo de configuración
require_once "config.php";
// Inicia la sesión
session_start();

// Verifica si el usuario está logueado, si no, redirecciona al index
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

// Calcula el total del carrito
$total = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
    }
}

// Incluye el header de la página
include "includes/header.php";
?>

<div class="container-pedido">
    <h2>Finalizar Compra</h2>
    <!-- Muestra el resumen del carrito con el total a pagar -->
    <div class="resumen-carrito">
        <h3>Resumen del Pedido</h3>
        <p>Total a pagar: $<?php echo number_format($total, 2); ?></p>
    </div>

    <!-- Formulario para recoger los datos de envío -->
    <form action="procesar_pedido.php" method="POST" class="form-pedido">
        <!-- Campos ocultos para el ID del usuario y el coste total -->
        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">
        <input type="hidden" name="coste" value="<?php echo $total; ?>">

        <!-- Campo para la provincia -->
        <div class="form-group">
            <label for="provincia">Provincia:</label>
            <input type="text" id="provincia" name="provincia" required class="form-control">
        </div>

        <!-- Campo para la localidad -->
        <div class="form-group">
            <label for="localidad">Localidad:</label>
            <input type="text" id="localidad" name="localidad" required class="form-control">
        </div>

        <!-- Campo para la dirección de envío -->
        <div class="form-group">
            <label for="direccion">Dirección de Envío:</label>
            <textarea id="direccion" name="direccion" required class="form-control"></textarea>
        </div>

        <!-- Botón para confirmar el pedido -->
        <button type="submit" class="btn-confirmar">Confirmar Pedido</button>
    </form>
</div>

<?php include "includes/footer.php"; ?>




