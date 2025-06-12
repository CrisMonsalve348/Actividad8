<?php 
require_once "config.php";

$nombre=$email=$password=$rol="";
$nombreerror=$emailerror=$passworderror=$rolerror="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    //validar nombre
    $input_nombre=trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombreerror="El campo de nombre no es valido";
    }
    elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"  )))){
        $nombreerror="El nombre solo puede contener letras"
    }
    else{
        $nombre=$input_nombre;
    }
}


?>