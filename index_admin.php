
<?php 
require_once "config.php";
session_start();
include "includes/header.php"

?>

<?php 
include "includes/sidebar.php"
?>

<form action="archivos_backend/categorias.php" method="post" class="crear_categoria">
    <h4>Crear categoria:</h4>
    <br>    
    <input type="text" name="categoria">
    <br>
    <input type="submit" name="subir-categoria" value="crear" id="boton_crearCateg">

    <?php if(!empty($_SESSION["errorcategoria"])): ?>
        <div id="alertacategoria" style="color:red; font-size=0.5rem; font-family:sans-serif; width:150px;">
        <?php 
        echo $_SESSION["errorcategoria"];
        ?>    
        </div>
        <script>
            setTimeout(() => {
                const alertacategoria=document.getElementById("alertacategoria");
                if(alertacategoria){
                    alertacategoria.style.display="none";
                }
            }, 4000);
        </script>


        <?php 
        unset($_SESSION["alertacategoria"]);
        endif;
        ?>
</form>
<hr>

<form action="archivos_backend/productos.php" method="post" class="crear_producto">
    <h4> Categoria: </h4>
    <select name="categoria_id" required>
        <?php 
            $categorias = $conexion->query("SELECT * FROM categorias");
            while($cat = $categorias->fetch_assoc()){
                echo "<option value='" . $cat['id'] . "'>" . $cat['nombre'] . "</option>";
            }
        ?>
    </select><br>

    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" required><br>

    <label>Stock:</label>
    <input type="number" name="stock" required><br>

    <label>Imagen:</label>
    <input type="file" name="imagen" accept="image/*"><br>

    <input type="submit" value="Crear Producto">
</form>

<?php 

include "includes/footer.php"

?>