
<?php 
include "includes/header.php";

session_start();
?>
<main>
<div class="sidebar_login">
    <form action="archivos_backend/validar_login.php" method="post" class="iniciar_sesion">
        <h5>INICIAR SESIÓN</h5>
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="password" name="contraseña" placeholder="Contraseña">
        <br>
        <input type="submit" value="iniciar sesion" id="boton_sesion">
        <br>
<?php if(!empty($_SESSION["errorlog"])): ?>
<div id="alertalog" style="color:red; font-size:0.5rem; font-family:sans-serif; width:150px;">
    <?php 
    echo $_SESSION["errorlog"];
    ?>
</div>
<script>
    setTimeout(() => {
       const alertalog=document.getElementById("alertalog");
       if(alertalog){
        alertalog.style.display="none";
       } 
    }, 4000);
</script>
<?php 
unset($_SESSION['errorlog']);
endif;
?>
    </form>
    
    
    <form action="archivos_backend/validar_reg.php" method="post" class="registro">
        <h5>REGISTRARSE</h5>
        <br>

        <input type="text" name="nombre" placeholder="Nombre">
        <br>
        <input type="text" name="apellidos" placeholder="apellidos">
        <br>
        <input type="text" name="correo" placeholder="Correo electrónico">
        <br>
        <input type="password" name="contraseña_re" placeholder="Contraseña">
        <br>
        <h5>Seleccione su rol:</h5>
        <br>
        <select name="rol" id="select_rol">
            <option value="null">Seleccionar</option>
            <option value="Usuario">Usuario</option>
            <option value="Admin">Administrador</option>
        </select>
        <br>
        <input type="submit" value="Registrarse" id="boton_registro">
        <br> 
<?php if(!empty($_SESSION["error"]))://forma de hacer una condiconal mezclando php con html?>
    <div id="alerta" style="color:red; font-size:0.5rem; font-family:sans-serif; width:150px;"> 
        <?php
        echo $_SESSION["error"]; 
        ?>
    </div>
     <script>
        setTimeout(() => {
            const alerta = document.getElementById('alerta');
            if (alerta) {
                alerta.style.display = 'none';
            }
        }, 4000);
    </script>
    <?php
    unset($_SESSION['error']);
    endif;//asi se ciera la condicional 
    ?>
    </form>

</div>
<section class = "vista_productos">
     <?php 
    
        if (isset($_GET['categoria_id']) && is_numeric($_GET['categoria_id'])) {
            $categoria_id = $_GET['categoria_id'];
            $sql = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
        }elseif(isset($_POST['inicio'])){
            $sql = "SELECT * FROM productos";
            $resultado = $conexion->query($sql);
        }
        else {
            $sql = "SELECT * FROM productos";
        }
        $resultado = $conexion->query($sql);
    ?>
    <ul class="productos">
        

    <?php while ($fila=$resultado->fetch_assoc()): ?>
        <li class="casilla_producto">
            
    
        <img src="<?php echo ($fila["imagen"]); ?>" alt="producto" class="imagen_producto">
            <p><?php echo $fila["nombre"]; ?> </p>
            <p><?php echo "$".$fila["precio"]; ?></p>
            <form action="#" method="post">
                <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                <input type="submit" value="Registrate para comprar">
            </form>
            
        </li>
    <?php  endwhile; ?>
    </ul>

</section>
    </main>
<?php 
include "includes/footer.php"

?>
