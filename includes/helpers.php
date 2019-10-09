<?php
require_once 'conexion.php';

function conseguirCategorias($db){
    //Realizar la consulta de categorias en la base de datos
    $sql = "SELECT * FROM categorias ORDER BY nombre ASC";
    $categorias = mysqli_query($db, $sql);
    //Variable a retornar en la vista (por defecto vacia)
    $categorias_encontradas = array(); 
    //Si la consulta encontró resultados con un monto mayor a 0 filas
    if($categorias && mysqli_num_rows($categorias)>0){
        $categorias_encontradas = $categorias;
    }
    //Al ser llamada la función, retornará la variable con las categorias encontradas
    return $categorias_encontradas;
}

function conseguirCategoria($db, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categoria_encontrada = mysqli_query($db, $sql);
    if($categoria_encontrada){
        $resultado = mysqli_fetch_assoc($categoria_encontrada);
    }else{
        $resultado = false;
    }
    return $resultado;
}

function conseguirEntradas($db, $limit = null, $categoria = null, $busqueda = null){
    $query = "SELECT e. id, e.titulo, LEFT(e.descripcion,180) AS 'descripcion', CONCAT(u.nombre,' ',u.apellidos) AS 'autor', DATE_FORMAT(e.fecha, '%d-%m-%Y') AS 'fecha', c.nombre AS 'categoria' FROM entradas e ".
             "INNER JOIN categorias c ON e.categoria_id = c.id ".
             "INNER JOIN usuarios u ON e.usuario_id = u.id ";
    
    if($categoria){
        $query .= "WHERE e.categoria_id = $categoria  ORDER BY e.id DESC;";
    }
//Si viene por parametro limit a la consulta se le concatenara un LIMIT 3 para que solo muestre las ultimas entradas
    if($limit){
        $query .= " ORDER BY e.id DESC LIMIT 3;";
    }
    if($busqueda){
      
        $query .= "WHERE e.titulo LIKE '%$busqueda%' OR e.descripcion LIKE '%$busqueda%' ORDER BY e.id DESC;";
    }
    if($categoria == null && $limit == null && $busqueda == null){ //mostrar_todas
        $query .= " ORDER BY e.id DESC;";
    }
    $conseguirEntradas = mysqli_query($db, $query);
    //Variable a retornar
    $entradasEncontradas = array();
    //Si encontró resultados
    if($conseguirEntradas && mysqli_num_rows($conseguirEntradas)>0){
        $entradasEncontradas = $conseguirEntradas;
        
    }else{
        $entradasEncontradas = false;
        
    }
    return $entradasEncontradas;
}

function mostrarEntrada($db, $id){
    $query = "SELECT e.*, CONCAT(u.nombre, ' ',u.apellidos) AS 'autor', c.nombre AS 'categoria' FROM entradas e ".
            "INNER JOIN usuarios u ON e.usuario_id = u.id ".
            "INNER JOIN categorias c ON e.categoria_id = c.id ".
            "WHERE e.id = $id;";
    $entrada = mysqli_query($db, $query);
    
    $resultado = array();
    if($entrada){
        $resultado = $entrada;
    }else{
        $resultado = false;
    }
    return $resultado;
    
}
function editarEntrada($db, $id){
    $query = "SELECT * FROM entradas WHERE id = $id;";
    $entrada = mysqli_fetch_assoc(mysqli_query($db, $query));
    
    $resultado = array();
    if($entrada && $entrada['usuario_id']==$_SESSION['usuario']['id']){
        $resultado = $entrada;
    }else{
        $resultado = false;
        header('Location: index.php');
    }
    return $resultado;
}

