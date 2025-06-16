
<div class="barra-lateral">

<h5>Carrito</h5>

<ul>
    <li>Productos{cantidad del producto}</li>
    <li>Total{total}</li>
    <li>Ver carrito</li>
</ul>
<hr>

<h5>

<?php 


 echo $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellidos"] ;

?>
</h5>
<h3>Gestionar productos</h3>
<ul>
<li>Gestionar categorías</li>
<li>Gestionar pedidos</li>
<li>Mis pedidos</li>
<li>Cerrar sesión</li>
</ul>
</div>