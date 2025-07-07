<?php 
require_once ("../config.php");
session_start();

$nombre=$descripcion=$precio=$stock="";
$nombreerror=$descripcionerror=$precioerror=$stockerror="";
$imagen=null;
$id_producto=$_POST["id"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
//condicinal que verifica que se presiono el boton de editar
if(isset($_POST["Cambiar"])){
    //validar nombre
$input_nombre=trim($_POST["nuevonombre"]);
if(empty($input_nombre)){
    $nombreerror="El campo esta vacio";
}
else {
    $nombre=$input_nombre;
}
   //validar descripcion
$input_descri=trim($_POST["nuevadescripcion"]);
if(empty($input_descri)){
    $descripcionerror="El campo esta vacio";
}
else {
    $descripcion=$input_descri;
}
//validar precio
$input_precio=trim($_POST["nuevoprecio"]);
if(empty($input_precio)){
    $precioerror="El campo esta vacio";
}
else {
    $precio=$input_precio;
}
//validar stock
$input_stock=trim($_POST["nuevostock"]);
if(empty($input_stock)){
    $stockerror="El campo esta vacio";
}
else {
    $stock=$input_stock;
}

    if(isset($_FILES['nuevaimagen']) && $_FILES['nuevaimagen']['error'] == 0){
        $directorio = "C:/xampp/htdocs/actividad8rep/Actividad8/img/";
        $directorioproyecto="img/";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
        echo "exito";

    }
    else {echo "fracaso";}
    $nombreImagen = time() . "_" . basename($_FILES["nuevaimagen"]["name"]);
    $rutaImagen = $directorioproyecto . $nombreImagen;

    if(move_uploaded_file($_FILES["nuevaimagen"]["tmp_name"], $directorio.$nombreImagen)){
        $imagen = $rutaImagen;
    }
}


if(empty($nombreerror) && empty($descripcionerror) && empty($precioerror) && empty($stockerror)){
    $_SESSION["error_product"]="";
    $sql="UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio, stock=$stock, imagen='$imagen' WHERE id=$id_producto";
    $conexion->query($sql);
    header("location:../gestionproductos.php");
    exit;
}
else{
    $_SESSION["error_product"]="Hay campos vacios";
    $_SESSION["id_respaldoproducto"]=$id_producto;
    header("location:../Cambiarproducto.php");
}

}
//condicional que verifica si se presiono el boton eliminar
elseif(isset($_POST["eliminar"])){
    
    
        $_SESSION["Consultaerror"]="";
    $sql="DELETE FROM productos WHERE `productos`.`id` =$id_producto";
    $conexion->query($sql);
    header("location:../gestionproductos.php");
    exit;
    
}
}

?>