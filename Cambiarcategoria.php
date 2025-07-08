<?php 

require_once "config.php";
session_start();
if(!isset($_POST["id_cat"])){
    $_POST["id_cat"]=$_SESSION["id_respaldo"];
}
include "includes/header.php";

?>
<main class="principalcategorias">
<?php 
include "includes/sidebaradmin.php";

?>

<form action="archivos_backend/gestioncategoria.php" method="post">
ingrese el nuevo nombre de la categoria 
<br>   
<input type="text" name="nuevonombre">
<input type="hidden" name="id" value="<?php echo $_POST["id_cat"]; ?>">
<input type="submit" Value="Cambiar" name="Cambiar">
<?php if(!empty($_SESSION["error_cat"])): ?>
    <div id="alertacat" style="color:red; font-size:0.5rem; font-family:sans-serif; width:150px;">
    <?php 
    echo $_SESSION["error_cat"];
    ?>
</div>
<script>
    setTimeout(() => {
       const alertacat=document.getElementById("alertacat");
       if(alertacat){
        alertacat.style.display="none";
       } 
    }, 4000);
</script>
<?php 
unset($_SESSION['errorcat']);
endif;
?>
</form>




</main>
<?php 

include "includes/footer.php";

?>