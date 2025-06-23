
<div class="barra-lateral">

    <h3 class="titulo-carrito">Carrito</h3>

    <ul class="carrito">
        <p> Productos</p>
        <p>Total</p>
        <a href="#">Ver carrito</a>
    </ul>


    <h3 class="titulo-usuario"> 
    <?php 
        echo $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellidos"] ;
    ?>
    </h3>

    <ul class="gestion-usuario">
        <a href="#">Gestionar productos</a>
        <a href="#">Gestionar categorias</a>
        <a href="#">Gestionar pedidos</a>
        <a href="#">Mis pedidos</a>
    <form action="archivos_backend/logout.php" method="post">
        <input type="submit" class="boton_cerrar" name="logout" value="Cerrar sesion">
    </form>

    </ul>
</div>

