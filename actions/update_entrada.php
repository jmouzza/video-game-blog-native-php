<?php
 if(isset($_POST)){
     require_once '../includes/conexion.php';
     if(!isset($_SESSION)){
         session_start();
     }
     //Recoger los datos por POST
     $titulo_update = isset($_POST['titulo']) ? mysqli_escape_string($db, $_POST['titulo']) : false;
     $descripcion_update = isset($_POST['descripcion']) ? mysqli_escape_string($db, $_POST['descripcion']) : false;
     $id_entrada_update = $_GET['id'];
//     var_dump($titulo_update);
//     var_dump($descripcion_update);
//     var_dump($id_entrada_update);
//     die();
     $errores = array();
     if(empty($titulo_update)){
         $errores['error_update_titulo'] = 'El titulo no puede estar vacío';
     }
     if(empty($descripcion_update)){
         $errores['error_update_descripcion'] = 'La descripción no puede estar vacía';
     }
     if(count($errores)== 0){
         $query = "UPDATE entradas SET ".
                  "titulo = '$titulo_update', ".
                  "descripcion = '$descripcion_update' ".
                  "WHERE id = $id_entrada_update;";
         $entradaActualizada = mysqli_query($db, $query);
         if($entradaActualizada){
             $_SESSION['entrada_actualizada'] = 'Entrada actualizada';
         }else{
             $_SESSION['entrada_no_actualizada'] = 'Ocurrió un error al conectar con la base de datos';
         }
     }else{
         $_SESSION['errores'] = $errores;
     }
     
     header("Location: ../editar_entrada.php?id=$id_entrada_update");
 }