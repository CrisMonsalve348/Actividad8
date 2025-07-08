<?php
require_once("../config.php");
session_start();

$producto_id=$_POST["id_producto"];
$id_usuario=$_SESSION["usuario"]["id"];
$cantidad=$_POST["cantidad"];


$sql="INSERT INTO lineas_pedidos(producto_id,unidades,id_usuario) VALUES ($producto_id,$cantidad,$id_usuario)";
 $conexion->query($sql);
header("Location: ../index_usuario.php");





?>