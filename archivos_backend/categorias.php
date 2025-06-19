<?php

require_once ("../config.php");
session_start();

$categoria = "";
$categoria_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_categoria=trim($_POST["categoria"]);
    if(!empty($input_categoria)){
        $categoria = $input_categoria;
    }else{
        $categoria_error = "Campo no valido";
    }
}



?>