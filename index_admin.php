
<?php 
require_once "config.php";
session_start();
include "includes/header.php"

?>

<?php 
include "includes/sidebar.php"
?>

<form action="categorias.php" method="POST">
    <input type="text" name="categoria">

    <input type="submit" name="subir-categoria">
</form>

<?php 
include "includes/footer.php"

?>