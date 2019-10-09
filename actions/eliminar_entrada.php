<?php
require_once '../includes/conexion.php';
if(isset($_GET)){
   $eliminar_entrada_id = $_GET['id'];
   
   $query = "DELETE FROM entradas WHERE id= $eliminar_entrada_id;";
   $eliminada = mysqli_query($db, $query);
   if($eliminada){
       $_SESSION['entrada_eliminada'] = 'Entrada eliminada';
   }
   header('Location: ../entrada_eliminada.php');
}


