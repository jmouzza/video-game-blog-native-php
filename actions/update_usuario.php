<?php

if($_POST){
    require_once '../includes/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }
    //Recibir datos por POST
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $usuario_id = $_SESSION['usuario']['id'];
    
    $errores = array();
    if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
        $errores['nombre'] = 'El nombre ingresado no es válido';
    }
    if(empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)){
        $errores['apellidos'] = 'Los apellidos ingresados no son válidos';
    }
    
    if(count($errores)==0){
        $query = "UPDATE usuarios SET ".
                 "nombre = '$nombre', ".
                 "apellidos = '$apellidos' ".
                 "WHERE id = $usuario_id;";
        $actualizado = mysqli_query($db, $query);
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellidos'] = $apellidos;
        if($actualizado){
            $_SESSION['actualizado'] = 'Datos de usuario actualizados satisfactoriamente.';
        }else{
            $_SESSION['error_al_guardar'] = 'Ocurrió un error al actualizar sus datos.';
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
    
}
header('Location: ../mis_datos.php');

