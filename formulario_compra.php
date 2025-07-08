
<?php 
require_once "config.php";
session_start();
include "includes/header.php";
$id_usuario=$_SESSION["usuario"]["id"];
$coste=$_POST["comprar"];
?>
<main class="principalusuario">
<?php 
include "includes/sidebarusuario.php"

?>

<form action="archivos_backend/validarcompra.php" method="post">

<input type="hidden" name="id_usuario" value="<?php echo $id_usuario;  ?>">
Provincia
<br>
<input type="text" name="provincia">
<br>
localidad
<br>
<input type="text" name="localidad">
<br>
direccion
<br>
<input type="text" name="direccion">
<br>
<input type="hidden" name="coste" value="<?php echo $coste; ?>">
<input type="hidden" name="estado" value="Enviado">
<br>
Fecha
<br>
<input type="date" name="fecha">
<br>
Hora
<br>
<input type="time" name="hora">
<br>
<input type="submit" value="Comprar">

</form>
<br>
<h3>Costo $<?php echo $coste; ?></h3>
 </main>
<?php 
include "includes/footer.php"

?>