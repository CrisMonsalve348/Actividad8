<?php
require_once("../config.php");
session_start();

$provinciaerror=$localidaderror=$direccionerror=$fechaerror=$horaerror="";
$providencia=$localidad=$direccion=$fecha=$hora="";

$id_usuario=$_POST["id_usuario"];
$coste=$_POST["coste"];
$estado=$_POST["estado"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
   //validar provincia
$input_provincia=trim($_POST["provincia"]);
if(empty($input_provincia)){
    $provinciaerror="El campo esta vacio";
}
else {
    $providencia=$input_provincia;
}
   //validar localudad
$input_localidad=trim($_POST["localidad"]);
if(empty($input_localidad)){
    $localidaderror="El campo esta vacio";
}
else {
    $localidad=$input_localidad;
}
//validar direccion
$input_direccion=trim($_POST["direccion"]);
if(empty($input_direccion)){
    $direccioerror="El campo esta vacio";
}
else {
    $direccion=$input_direccion;
}
//validar fecha
$input_fecha=trim($_POST["fecha"]);
if(empty($input_fecha)){
    $fechaerror="El campo esta vacio";
}
else {
    $fecha=$input_fecha;
}
//validar hora
$input_hora=trim($_POST["hora"]);
if(empty($input_hora)){
    $horaerror="El campo esta vacio";
}
else {
    $hora=$input_hora;
}
if(empty($provinciaerror) && empty($localidaderror) && empty($direccioerror) && empty($fechaerror) && empty($horaerror)){

$_SESSION["errorcompra"]="";
$sql="INSERT INTO pedidos(usuario_id,provincia,localidad,direccion,coste,estado,fecha,hora) VALUES ($id_usuario,'$providencia','$localidad','$direccion',$coste,'$estado','$fecha','$hora')";
$conexion->query($sql);
header("location:../compraexitosa.php");
}


}


?>