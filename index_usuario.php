
<?php 
require_once "config.php";
session_start();
include "includes/header.php"

?>
<main class="principalusuario">
<?php 
include "includes/sidebar.php"

?>

<section class = "vista_productos">
     <?php 
    
        $sql="SELECT * FROM productos";
        $resultado=$conexion->query($sql);
    ?>
    <ul class="productos">
        

    <?php while ($fila=$resultado->fetch_assoc()): ?>
        <li class="casilla_producto">
            
    
        <img src="<?php echo ($fila["imagen"]); ?>" alt="producto" class="imagen_producto">
            <p><?php echo $fila["nombre"]; ?> </p>
            <p><?php echo "$".$fila["precio"]; ?></p>
            <form action="producto_usuario.php" method="post">
                <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                <input type="submit" value="Comprar">
            </form>
            
        </li>
    <?php  endwhile; ?>
    </ul>

</section>
    </main>
<?php 
include "includes/footer.php"

?>