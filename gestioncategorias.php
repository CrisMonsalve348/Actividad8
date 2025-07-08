<?php 
require_once "config.php";
session_start();
include "includes/header.php";

?>
<main class="principalcategorias">
<?php 
include "includes/sidebaradmin.php";
?>

<?php 
        
        $sql="SELECT * FROM categorias";
        $resultado=$conexion->query($sql);
    ?>
    <ul class="lista_categorias_gestion">
      

    <?php while ($fila=$resultado->fetch_assoc()): ?>
        <li class="fila_de_gestion">
        <p> ID: <?php echo $fila["id"]; ?></p>
    <?php 
        
         echo htmlspecialchars($fila["nombre"]);
    ?>
          <form action="Cambiarcategoria.php" method="post">
            <input type="hidden" name="id_cat" value="<?php echo $fila["id"]; ?>">
            <input type="submit" value="Editar">
          </form>
          <form action="archivos_backend/gestioncategoria.php" method="post">
            <input type="hidden" value="<?php echo $fila["id"]; ?>" name="id">
            <input type="submit" value="Eliminar" name="eliminar">
            <?php if(!empty($_SESSION["Consultaerror"])): ?>
    <div id="alertaeliminar" style="color:red; font-size:0.5rem; font-family:sans-serif; width:150px;">
    <?php 
    echo $_SESSION["Consultaerror"];
    ?>
</div>
<script>
    setTimeout(() => {
       const alertacat=document.getElementById("alertaliminar");
       if(alertaeliminar){
        alertaeliminar.style.display="none";
       } 
    }, 4000);
</script>
<?php 
unset($_SESSION['Consultaerror']);
endif;
?>
          </form>    
        </li>
    <?php  endwhile; ?>
    </ul>





</main>
<?php 

include "includes/footer.php";

?>