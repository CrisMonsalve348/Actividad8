
<div class="barra-lateral">

    <h3 class="titulo-carrito">Gestion de cuenta</h3>

    <ul class="carrito">
        <a href="carritoview.php">Ver carrito</a>
        <a href="historial_pedidos.php">Historial de pedidos</a>
    </ul>


    <h3 class="titulo-usuario"> 
    <?php 
        echo $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellidos"] ;
    ?>
    </h3>

    <ul class="gestion-usuario">
    
    <form action="archivos_backend/logout.php" method="post">
        <input type="submit" class="boton_cerrar" name="logout" value="Cerrar sesion">
    </form>

    </ul>
</div>

