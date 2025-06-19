<?php

require_once ("../config.php");
session_start();

$categoria = "";
$categoria_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["categoria"])){
        $categoria = $_POST["categoria"];
    }else{
        $categoria_error = "Campo no valido";
    }
}



?>