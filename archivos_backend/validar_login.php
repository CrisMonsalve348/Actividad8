<?php 
require_once ("../config.php");
session_start();

$email=$password="";
$emailerror=$passworderror="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    //validar Email
    $input_email=$_POST["email"];
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
    $input_contraseña=$_POST["contraseña"];
    if(empty($input_contraseña)){
        $passworderror="El campo de contraseña esta vacio";
    }
    else{
        $password=$input_contraseña;
    }

    if(empty($emailerror) && empty($passworderror)){ 
        $_SESSION["errorlog"]="";
        $sql="SELECT * FROM usuarios WHERE email=? AND password=?";
        $stmt=mysqli_prepare($conexion, $sql);
         mysqli_stmt_bind_param($stmt, "ss", $email,$password);
         mysqli_stmt_execute($stmt);
         $resultado=mysqli_stmt_get_result($stmt);

          if(mysqli_num_rows($resultado) == 1){
            $usuario = mysqli_fetch_assoc($resultado);

            
            $_SESSION["usuario"]=$usuario;
           if ($usuario["rol"]=="Usuario"){
            header("location:../index_usuario.php");
           }
           else{
            header("location:../index_admin.php");
            
           }
          }
          else{
            header("location:../index.php");
            $_SESSION["errorlog"]="El correo o la contraseña son incorrectos";
                   
        }
          
    }
    else{

        $_SESSION["errorlog"]="ingrese los campos correctamente";
        header("location:../index.php");
        
    }
    
}
?>