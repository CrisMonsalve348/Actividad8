
<?php 
require_once "config.php";
session_start();
include "includes/header.php"

?>

<?php 
include "includes/sidebar.php"
?>

<form action="archivos_backend/categorias.php" method="post">
CATEGORIA    
<input type="text" name="categoria">

    <input type="submit" name="subir-categoria" value="crear">
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

<?php 

include "includes/footer.php"

?>