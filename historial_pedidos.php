<?php
require_once("config.php");
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];
$rol = strtolower($_SESSION['usuario']['rol']); 
$es_admin = $rol === 'admin';


if ($es_admin) {
    $sql = "SELECT p.*, u.nombre AS nombre_usuario, u.apellidos
            FROM pedidos p
            INNER JOIN usuarios u ON p.usuario_id = u.id
            ORDER BY p.fecha DESC, p.hora DESC";
} else {
    $sql = "SELECT * FROM pedidos WHERE usuario_id = $id_usuario ORDER BY fecha DESC, hora DESC";
}

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title class>Historial de pedidos</title>
    <style>
        body{
            background: linear-gradient(135deg, #532889 0%, #d8cfe3 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction:column;
        }
        table{
            background-color:white;
            border: 1px solid black;
        }
        th{
            color:#4CAF50;
        }

        h1{
            color:white;
        }

    </style>
</head>
<body>

<h1>Historial de pedidos</h1>

<table border="1" cellpadding="8">
    <tr>
        <?php if ($es_admin): ?>
            <th>Usuario</th>
        <?php endif; ?>
        <th>Dirección</th>
        <th>Coste</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Detalles</th>
    </tr>

    <?php while ($pedido = $resultado->fetch_assoc()): ?>
        <tr>
            <?php if ($es_admin): ?>
                <td><?= htmlspecialchars($pedido['nombre_usuario'] . ' ' . $pedido['apellidos']) ?></td>
            <?php endif; ?>
            <td><?= htmlspecialchars($pedido['direccion'] . ', ' . $pedido['localidad'] . ', ' . $pedido['provincia']) ?></td>
            <td><?= number_format($pedido['coste'], 2) ?> $</td>
            <td><?= htmlspecialchars($pedido['estado']) ?></td>
            <td><?= $pedido['fecha'] ?></td>
            <td><?= $pedido['hora'] ?></td>
            <td><a href="detalle_pedido.php?id=<?= $pedido['id'] ?>">Ver</a></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>