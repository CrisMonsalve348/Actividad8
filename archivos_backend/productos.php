<?php

require_once ("../config.php");
session_start();

$producto = "";
$producto_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["productos"])){
        $producto = $_POST["producto"];
    }else{
        $producto_error = "Campo no valido";
         header("Location:../index_admin.php");
    }
}


// fragmento para recoger datos del formulario
$categoria_id = $_POST['categoria_id'];
$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$oferta = $_POST['oferta'];
$fecha = date("Y-m-d"); // Guarda la fecha actual en la que se creo el producto


// Manejo de imagen
$imagen = null;
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
    $directorio = "uploads/";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }
    $nombreImagen = time() . "_" . basename($_FILES["imagen"]["name"]);
    $rutaImagen = $directorio . $nombreImagen;

    if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)){
        $imagen = $rutaImagen;
    }
}

// Fragmento para insertar todos los datos en la base sql
$sql = "INSERT INTO productos (categoria_id, nombre, descripcion, precio, stock, oferta, fecha, imagen) 
        VALUES ('$categoria_id', '$nombre', '$descripcion', '$precio', '$stock', '$oferta', '$fecha', '$imagen')";

if($conn->query($sql)){
    echo "Producto creado exitosamente.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
<?