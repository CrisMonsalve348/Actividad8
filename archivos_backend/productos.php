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
        $directorio = "img/";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }
    $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
    $rutaImagen = $directorio . $nombreImagen;

    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)){
        $imagen = $rutaImagen;
    }
}
}


// Fragmento para insertar todos los datos en la base sql
$sql = "INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) 
        VALUES ('$categoria_id', '$nombre', '$descripcion', '$precio', '$stock', '$oferta', '$fecha', '$imagen')";

if($conexion->query($sql)){
    echo "Producto creado exitosamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?> 