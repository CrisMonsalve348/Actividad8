<?php 
require_once "config.php";
session_start();
include "includes/header.php";

?>
<main class="principalproductos">
<?php 
include "includes/sidebaradmin.php";
?>

<?php 
        
        $sql="SELECT * FROM productos";
        $resultado=$conexion->query($sql);
    ?>
    <ul class="lista_productos_gestion">
      

    <?php while ($fila=$resultado->fetch_assoc()): ?>
        <li class="fila_de_gestion">
        <p> ID: <?php echo $fila["id"]; ?></p>
    <?php 
        
         echo htmlspecialchars($fila["nombre"]);
    ?>
    <p> Precio: <?php echo $fila["precio"]; ?></p>
    <p> Stock: <?php echo $fila["stock"]; ?></p>

          <form action="Cambiarproducto.php" method="post">
            <input type="hidden" name="id_product" value="<?php echo $fila["id"]; ?>">
            <input type="submit" value="Editar">
          </form>
          <form action="archivos_backend/gestionproducto.php" method="post">
            <input type="hidden" value="<?php echo $fila["id"]; ?>" name="id">
            <input type="submit" value="Eliminar" name="eliminar">
           
          </form>    
        </li>
    <?php  endwhile; ?>
    </ul>





</main>
<?php 

include "includes/footer.php";

?>