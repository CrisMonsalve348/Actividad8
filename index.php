
<?php 
include "includes/header.php"

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
</form>

</div>


<?php 
include "includes/footer.php"

?>