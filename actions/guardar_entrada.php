<?php
if(isset($_POST)){
    require_once '../includes/conexion.php';
    //Recoger datos recibidos por $_POST
    $usuario_id = (int)$_SESSION['usuario']['id'];
    $categoria_id = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;

    //Validando datos antes de guardar
    $errores = array();
    if(!empty($usuario_id) && !empty($categoria_id) && !empty($titulo) && !empty($descripcion)){
        $query = "INSERT INTO entradas VALUES(null,$usuario_id,$categoria_id,'$titulo','$descripcion',CURDATE());";
        $entrada_guardada = mysqli_query($db, $query);
        
        if($entrada_guardada){
            $_SESSION['entrada_guardada'] = "La entrada fue guardada satisfactoriamente";
        }else{
            $_SESSION['entrada_error'] = "Error al guardar entrada. Complete todos los campos";
        }
    }else{
            $_SESSION['entrada_campo_vacio'] = "Error al guardar entrada. Complete todos los campos";
        }
    header('Location: ../crear_entrada.php');
}
    

 