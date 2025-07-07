
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
    <div id="alertacategoria" style="color:red; font-size:0.5rem; font-family:sans-serif; width:150px;">
        <?php echo $_SESSION["errorcategoria"]; ?>    
    </div>
    <script>
        setTimeout(() => {
            const alertacategoria = document.getElementById("alertacategoria");
            if (alertacategoria) {
                alertacategoria.style.display = "none";
            }
        }, 4000);
    </script>
    <?php unset($_SESSION["errorcategoria"]); ?>
<?php endif; ?>
</form>


<form action="archivos_backend/productos.php" method="post" enctype="multipart/form-data" class="crear_producto" enctype="multipart/form-data">
    <h4>Crear producto:</h4>
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
    </select><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" id="precio" required><br>

    <label for="oferta">Oferta:</label>
    <input type="number" name="oferta" id="oferta" min="0" max="100" value="0"><br>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" required><br>

    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" id="imagen" accept="image/*"><br>

    <input type="submit" value="Crear Producto" id="boton_crearproducto">
</form>

<section class = "vista_productos">
     <?php 
    
        if (
    (isset($_GET['categoria_id']) && is_numeric($_GET['categoria_id']))
    || (isset($_POST['categoria_id']) && is_numeric($_POST['categoria_id']))
) {
    // Soporte tanto para GET como POST en caso de que quieras usar uno u otro
    $categoria_id = $_GET['categoria_id'] ?? $_POST['categoria_id'];
    $sql = "SELECT * FROM productos WHERE categoria_id = $categoria_id";
} else {
    // Mostrar todos los productos si no hay categoría activa o si se envió "inicio"
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
            <form action="producto_usuario.php" method="post">
                <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                <input type="submit" value="Comprar">
            </form>
            
        </li>
    <?php  endwhile; ?>
    </ul>

</section>

<?php 

include "includes/footer.php"

?>