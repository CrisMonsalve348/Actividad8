<?php 
require_once ("../config.php");
session_start();

$categoria="";
$categoriaerror="";
$id_categoria=$_POST["id"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
//condicinal que verifica que se presiono el boton de editar
if(isset($_POST["Cambiar"])){
$input_categoria=trim($_POST["nuevonombre"]);
if(empty($input_categoria)){
    $categoriaerror="El campo esta vacio";
}
else {
    $categoria=$input_categoria;
}

if(empty($categoriaerror)){
    $_SESSION["error_cat"]="";
    $sql="UPDATE categorias SET nombre='$categoria' WHERE id=$id_categoria";
    $conexion->query($sql);
    header("location:../gestioncategorias.php");
    exit;
}
else{
    $_SESSION["error_cat"]=$categoriaerror;
    $_SESSION["id_respaldo"]=$id_categoria;
    header("location:../Cambiarcategoria.php");
}

}
//condicional que verifica si se presiono el boton eliminar
elseif(isset($_POST["eliminar"])){
    $sql="SELECT COUNT(*) AS TOTAL from productos WHERE categoria_id=$id_categoria";
    $result=$conexion->query($sql);
    $fila=$result->fetch_assoc();

    if($fila["TOTAL"]>0){
        $_SESSION["Consultaerror"]="Existen productos asociados con esta categoria";
        header("location:../gestioncategorias.php");

    }
    else{
        $_SESSION["Consultaerror"]="";
    $sql="DELETE FROM categorias WHERE `categorias`.`id` =$id_categoria";
    $conexion->query($sql);
    header("location:../gestioncategorias.php");
    exit;
    }
}
}

?>