<link rel="stylesheet" href="estilo_vista.css">
<?php

// Incluye los archivos de configuración y el encabezado
require_once("config.php");
require_once("includes/header.php");
// Inicia la sesión para manejar el carrito
session_start();

$id_usuario=$_SESSION['usuario']['id'];
$total=0;
  $sql="SELECT * FROM lineas_pedidos WHERE id_usuario=$id_usuario";
$resultado=$conexion->query($sql);
 ?>
<?php while ($fila = $resultado->fetch_assoc()): 
    $id_producto=$fila["producto_id"];
    ?>

<ul class="contenido_carrito">
        <li style="display:flex; flex-direction:column; background-color:#fbf1ef;">
        <p>ID:<?php echo $fila["producto_id"]; ?></p>
        <p>
        Producto:
    <?php
    
     $sql_producto="SELECT * FROM productos WHERE id=$id_producto";
     $res_producto=$conexion->query($sql_producto);
     $nombre_pr=$res_producto->fetch_assoc();
     $subtotal = $nombre_pr["precio"] * $fila["unidades"];
    $total += $subtotal; // Acumular en total
     echo  $nombre_pr["nombre"];
    ?>
   
        </p>
   
    <p>Cantidad: <?php echo $fila["unidades"]; ?></p>
    <p>Precio unitario $<?php echo ($nombre_pr["precio"]*$fila["unidades"]); ?></p>
    <hr>
    </li>
</ul>


<?php 
endwhile;
?>

<div class="pago-carrito">
    <h3 id="valor_pago">Total a pagar $<?php echo  $total; ?></h3>

    <form action="formulario_compra.php" method="post">
        <input type="hidden" name="comprar" value="<?php echo $total; ?>">
        <input type="submit" name="pedido" Value="Hacer Compra" id="boton_compra">
    </form>
</div>
      
           

<?php 
// Incluye el pie de página
require_once("includes/footer.php"); 
?>
