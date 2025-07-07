<link rel="stylesheet" href="estilo_vista.css">
<?php
// Incluye los archivos de configuración y el encabezado
require_once("config.php");
require_once("includes/header.php");
// Inicia la sesión para manejar el carrito
session_start();
?>
<!-- Mostrar mensajes de éxito o error -->
<?php if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-<?php echo $_SESSION['mensaje_tipo'] == 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <?php 
        echo $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
        unset($_SESSION['mensaje_tipo']);
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<div class="container mt-5">
    <!-- Título principal del carrito de compras -->
    <h2>Mi Carrito de Compras</h2>
    <div class="table-responsive">
        <!-- Tabla que muestra los productos en el carrito -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inicializa el total de la compra
                $total = 0;
                // Verifica si hay productos en el carrito
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                    // Recorre cada producto en el carrito
                    foreach ($_SESSION['carrito'] as $producto_id => $producto) {
                        // Calcula el subtotal por producto
                        $subtotal = $producto['precio'] * $producto['cantidad'];
                        // Suma al total general
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                            <td>
                                <!-- Formulario para eliminar productos del carrito -->
                                <form action="archivos_backend/carrito.php" method="POST">
                                    <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
                                    <button type="submit" name="eliminar_producto" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    // Mensaje cuando el carrito está vacío
                    echo "<tr><td colspan='5' class='text-center'>El carrito está vacío</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <!-- Muestra el total general de la compra -->
                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
                <!-- Agregar antes del cierre de la tabla -->
                <?php if ($total > 0): ?>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="realizar_pedido.php" class="btn-realizar-pedido">
                                <i class="fas fa-shopping-bag"></i> Realizar Pedido
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tfoot>
        </table>
    </div>
</div>
<?php 
// Incluye el pie de página
require_once("includes/footer.php"); 
?>
