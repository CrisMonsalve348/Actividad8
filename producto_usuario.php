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
 

<section class="product_conteiner">

<div class="img_container">
    <img src="img/Portadas_iPhone13Pro.webp" alt="imagen">
</div>
<div class="info_container">
    <div class="tituloyprecio"><h2>Categorias</h2> <h2>32000000 COP</h2></div>

<p class="parrafo">El iPhone 13 Pro es un smartphone de alta gama de Apple que ofrece un rendimiento potente gracias a su chip A15 Bionic, una pantalla Super Retina XDR de 6.1 pulgadas con 
    tecnología ProMotion de 120 Hz, y un sistema de triple cámara avanzado con modo noche y 
    grabación en ProRes.</p>
    <div class="stacks">
    <p>Stock</p>
    <input type="number">
    </div>
    <div class="botones">
        <button id="compra">Comprar</button>
        <button id="vermas">Ver otros productos</button>
    </div>
</div>
</section>







</main>
<?php 
include "includes/footer.php";

?>