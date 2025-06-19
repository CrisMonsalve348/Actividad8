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
         header("Location:../index_admin.php");
    }


    if(empty($categoria_error)){
        $_SESSION["errorcategoria"] = "";
        $sql = "INSERT INTO categorias(nombre) VALUES (?)";
        if($stmt = mysqli_prepare($conexion,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$param_categoria);

            //Crear parametros
            $param_categoria = $categoria;

            if(mysqli_stmt_execute($stmt)){
                header("Location:../index_admin.php");

                exit();
            }else{
                echo "Error al crear categoria";
            }
        }
        //cerramos
        mysqli_stmt_close($stmt);
    }
    //Alertas
    else{
        $_SESSION["errorcategoria"]="El campo está vacio";
    }
mysqli_close($conexion);
}



?>