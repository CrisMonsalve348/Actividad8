<?php 
require_once "config.php";
session_start();
include "includes/header.php";
?>
<main class="principal">
<?php 
include "includes/sidebarusuario.php";
//<h1 id="titulo_producto">Iphone 13Pro</h1>
?>
 <?php 
  $sql="SELECT * FROM productos";
$resultado=$conexion->query($sql);
 ?>
<section class="product_conteiner">
<?php while ($fila=$resultado->fetch_assoc()): 
    if($_POST["id"]==$fila["id"]):?>

<div class="img_container">
    <img src="<?php echo $fila["imagen"]; ?>" alt="imagen">
</div>
<div class="info_container">
    <div class="tituloyprecio"><h2>Categorias</h2> <h2><?php echo "$".$fila["precio"]; ?></h2></div>

<p class="parrafo"><?php echo $fila["descripcion"]; ?></p>
    <div class="stacks">
        <form action="archivos_backend/carrito.php" method="post">
    <p>Stock</p>
    <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php echo $fila['stock']; ?>" class="form-control">
    </div>
    <div class="botones">

       
        <input type="hidden" name="id_producto" Value="<?php echo $fila["id"]; ?>">
        <input type="submit" id="agrega" Value="Agregar al carrito" name="Agregar">
        </form>
        <?php
        endif;
         endwhile;
        ?>
    </div>
</div>
</section>







</main>
<?php 
include "includes/footer.php";

?>
