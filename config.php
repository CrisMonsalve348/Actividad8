<?php 

define('DB_SERVIDOR', "localhost");
define('DB_USUARIO', "root");
define('DB_CONTRASENA', "123456");
define('DB_NOMBRE', "tienda_virtual");

// Crear la conexion a la DB
$conexion = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_CONTRASENA, DB_NOMBRE);

// Revisar la conexion
if($conexion === false){
    die("ERROR: No se puede conectar" . mysqli_connect_error());
} 



?>