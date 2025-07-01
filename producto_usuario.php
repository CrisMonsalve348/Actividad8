<?php 
require_once "config.php";
session_start();
include "includes/header.php";
?>
<main class="principal">
<?php 
include "includes/sidebar.php";
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
    <p>Stock</p>
    <input type="number">
    </div>
    <div class="botones">
        <button id="compra">Comprar</button>
        <button id="vermas">Ver otros productos</button>
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