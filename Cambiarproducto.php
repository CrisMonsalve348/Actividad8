<?php 

require_once "config.php";
session_start();
if(!isset($_POST["id_product"])){
    $_POST["id_product"]=$_SESSION["id_respaldoproducto"];
}
include "includes/header.php";

?>
<main class="principalcategorias">
<?php 
include "includes/sidebaradmin.php";

?>

<form action="archivos_backend/gestionproducto.php" method="post" enctype="multipart/form-data">
<h2>Ingrese los nuevos datos del producto</h2>
<br>  
Nombre 
<input type="text" name="nuevonombre">
<br>
Descripcion
<input type="text" name="nuevadescripcion">
<br>
Precio
<input type="number" name="nuevoprecio">
<br>
Stock
<input type="number" name="nuevostock">
<br>
 <label> Seleccionar categoria: </label>
    <select name="categoria_id" required>
        <?php 
        $categorias = $conexion->query("SELECT * FROM categorias");
        if ($categorias) {
            while($cat = $categorias->fetch_assoc()){
                echo "<option value='" . $cat['id'] . "'>" . $cat['nombre'] . "</option>";
            }
        } else {
            echo "<option value=''>Error al cargar</option>";
        }
        ?>
    </select>
    <br>
    imagen
     <input type="file" name="nuevaimagen" id="imagen" accept="image/*">
     <br>


<input type="hidden" name="id" value="<?php echo $_POST["id_product"]; ?>">
<input type="submit" Value="Cambiar" name="Cambiar">
<?php if(!empty($_SESSION["error_product"])): ?>
    <div id="alertaproduct" style="color:red; font-size:0.5rem; font-family:sans-serif; width:150px;">
    <?php 
    echo $_SESSION["error_product"];
    ?>
</div>
<script>
    setTimeout(() => {
       const alertaproduct=document.getElementById("alertaproduct");
       if(alertaproduct){
        alertaproduct.style.display="none";
       } 
    }, 4000);
</script>
<?php 
unset($_SESSION['error_product']);
endif;
?>
</form>




</main>
<?php 

include "includes/footer.php";

?>