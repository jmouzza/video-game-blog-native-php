<?php

if(isset($_POST)){
    //Conexión a base de datos
    require_once '../includes/conexion.php';
    //Recoger datos del formulario LOGIN
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $_SESSION['error_login'] = null;
    $_SESSION['sin_registro'] = null;
     
    //Verificar coincidencia de correo en base de datos
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $query);
    
    if($login && mysqli_num_rows($login)==1){
        $usuario = mysqli_fetch_assoc($login);
        
        //Verificar contraseña
        $password_verificada = password_verify($password, $usuario['password']);
        if($password_verificada){
            //Exito de Login
            $_SESSION['usuario'] = $usuario;
            
        }else{
            //Falla de Login
            $_SESSION['error_login'] = 'Error de autenticación';
        }
    }else{
        // No consiguió el email en la base de datos
        $_SESSION['sin_registro'] = 'Email no registrado';
    }
    //Redirección a index
    header("Location: ../index.php");

}

