<?php
if(!isset($_SESSION["usuario"])){
    $_SESSION["usuario"]=[];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology world</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Didact+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/estilo_index.css">
    <link rel="stylesheet" href="estilos/estilo_producto.css">
</head>
<body>
    <header>
        <h1>Technology world</h1>
    </header>
    <?php 
        require_once "config.php";
        $sql="SELECT * FROM categorias";
        $resultado=$conexion->query($sql);
    ?>
    <ul class="lista_categorias">
        <li>
            <a href="#">inicio</a>
        </li>

    <?php while ($fila=$resultado->fetch_assoc()): ?>
        <li>
            <a href="#">
    <?php 
         echo htmlspecialchars($fila["nombre"]);
    ?>
            </a>
        </li>
    <?php  endwhile; ?>
    </ul>
    <?php $conexion->close(); ?>
    <!-- <nav>
        <ul class="categorias">
            <a href="#">inicio</a>
            <a href="#">categoria 1 </a>
            <a href="#">categoria 2 </a>
            <a href="#">categoria 3 </a>
            <a href="#">categoria 4 </a>
        </ul>
    </nav> -->
    
