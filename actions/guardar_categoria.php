<?php
require_once '../includes/conexion.php';
//Recibir datos por POST
if(isset($_POST)){
    
    $categoria = isset($_POST['categoriaNueva']) ? $_POST['categoriaNueva'] : false;
    //Verificando que la categoria no exista
    $query = "SELECT nombre FROM categorias WHERE nombre = '$categoria'";
    $categoria_duplicada = mysqli_query($db, $query);
   
    if(mysqli_num_rows($categoria_duplicada)>0){
        $_SESSION['duplicado'] = 'Categoría duplicada';
    }else{
        $query2 = "INSERT INTO categorias VALUES(null,'$categoria')";
        $categoria_nueva = mysqli_query($db, $query2);
        if($categoria_nueva){
            $_SESSION['categoria_nueva'] = 'Categoría nueva creada';
        }else{
            $_SESSION['error_categoria'] = 'Error al crear categoría';
        }
    }
   
}

header('Location: ../crear_categoria.php');


