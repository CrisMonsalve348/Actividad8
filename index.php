
<?php 
include "includes/header.php";

session_start();
?>
<div class="sidebar_login">
<form action="archivos_backend/validar_login.php" method="post">
<h5>Iniciar sesion</h5>
<br>
<input type="text" name="email" placeholder="Email">
<br>
<input type="password" name="contraseña" placeholder="Contraseña">
<br>
<input type="submit" value="iniciar sesion">
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

<hr>
<form action="archivos_backend/validar_reg.php" method="post">
<h5>Resgistrarse</h5>
<br>


<input type="text" name="nombre" placeholder="Nombre">
<br>
<input type="text" name="apellidos" placeholder="apellidos">
<br>
<input type="text" name="correo" placeholder="Correo electrónico">
<br>
<input type="password" name="contraseña_re" placeholder="Contraseña">
<br>
Seleccione su rol
<br>
<select name="rol">
    <option value="null">Seleccionar</option>
    <option value="Usuario">Usuario</option>
    <option value="Admin">Administrador</option>
</select>
<br>
<input type="submit" value="Registrarse">
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


<?php 
include "includes/footer.php"

?>