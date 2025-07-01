<?php

require_once ("../config.php");
session_start();

$producto = "";
$producto_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $categoria_id = $_POST['categoria_id'];
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $oferta = $_POST['oferta'];
    $fecha = date("Y-m-d"); // Guarda la fecha actual en la que se creo el producto

    $imagen = null;
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
        $directorio = "C:/xampp/htdocs/actividad8rep/Actividad8/img/";
        $directorioproyecto="img/";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
        echo "exito";

    }
    else {echo "fracaso";}
    $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
    $rutaImagen = $directorioproyecto . $nombreImagen;

    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $directorio.$nombreImagen)){
        $imagen = $rutaImagen;
    }
}
}


// Fragmento para insertar todos los datos en la base sql
$sql = "INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) 
        VALUES ('$categoria_id', '$nombre', '$descripcion', '$precio', '$stock', '$oferta', '$fecha', '$imagen')";

if($conexion->query($sql)){
    echo "Producto creado exitosamente.";
   header("location:../index_admin.php");
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?> 