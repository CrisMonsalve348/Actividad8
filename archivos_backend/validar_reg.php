<?php 
require_once ("../config.php");

$nombre=$apellido=$email=$password=$rol="";
$nombreerror=$apellidoerror=$emailerror=$passworderror=$rolerror="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    //validar nombre
    $input_nombre=trim($_POST["nombre"]);
    if(empty($input_nombre)){
        $nombreerror="El campo de nombre no es valido";
    }
    elseif(!filter_var($input_nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"  )))){
        $nombreerror="El nombre solo puede contener letras";
    }
    else{
        $nombre=$input_nombre;
    }
    //validar apellido
    $input_apellido=trim($_POST["apellidos"]);
    if(empty($input_apellido)){
        $apellidoerror="El campo de apellido no es valido";
    }
    elseif(!filter_var($input_apellido, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"  )))){
        $apellidoerror="El nombre solo puede contener letras";
    }
    else{
        $apellido=$input_apellido;
    }
    //validar Email
    $input_email=$_POST["correo"];
    if(empty($input_email)){
        $emailerror="El campo de correo no es valido";
    }
    elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $emailerror="El correo escrito no es valido";
    }
    else{
        $email=$input_email;
    }
    //validar contraseña
    $input_contraseña=$_POST["contraseña_re"];
    if(empty($input_contraseña)){
        $passworderror="El campo de contraseña esta vacio";
    }
    else{
        $password=$input_contraseña;
    }
    //validar rol
    if($_POST["rol"]=="null"){
        $rolerror="seleccione un rol";
    }
    else{
        $rol=$_POST["rol"];
    }

    //******************************************************************** */
    if(empty($nombreerror) && empty($apellidoerror) && empty($emailerror) && empty($passworderror) && empty($rolerror)){
        //sentencia sql
        $sql="INSERT INTO usuarios(nombre,apellidos,email,password,rol) VALUES (?,?,?,?,?)";
        if($stmt=mysqli_prepare($conexion, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_nombre, $param_apellidos, $param_email, $param_contraseña, $param_rol);
            
            //crear los parametros
            $param_nombre=$nombre;
            $param_apellidos=$apellido;
            $param_email=$email;
            $param_contraseña=$password;
            $param_rol=$rol;


            if(mysqli_stmt_execute($stmt)){
                header("location:../index.php");
                exit();
            }else{
                echo "Ocurrio un error";
            }

        }
         // Cerramos
        mysqli_stmt_close($stmt);
    }
      // Cerramos la conexion
    mysqli_close($conexion);
}



?>