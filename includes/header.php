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
    <link rel="stylesheet" href="estilos/estilo_pedido.css">
    <link rel="stylesheet" href="estilos/estilo_vista.css">
</head>
<body>
    <header>
        <h1>Technology world</h1>
    </header>
    <?php 
        $archivo_actual = basename($_SERVER['PHP_SELF']);
        require_once "config.php";
        $sql="SELECT * FROM categorias";
        $resultado=$conexion->query($sql);
    ?>
    <ul class="lista_categorias">
        <li>
            <form action="<?php echo $archivo_actual; ?>" method="post">
                <input type="hidden" name="inicio" value="1" >
                <input type="submit" value="inicio">
            </form>
        </li>
        
        <?php
        $destino = "index.php"; // por defecto

        if ($archivo_actual === "index_admin.php") {
            $destino = "index_admin.php";
        } elseif ($archivo_actual === "index_usuario.php") {
            $destino = "index_usuario.php";
        }
        

        ?>

        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <li>
            <a href="<?php echo $destino . '?categoria_id=' . $fila['id']; ?>">
                <?php echo htmlspecialchars($fila["nombre"]); ?>
            </a>
        </li>
        <?php endwhile; ?>

    </ul>
    
 
    
