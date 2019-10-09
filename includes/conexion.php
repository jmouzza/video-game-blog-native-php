<?php
//Conexión 
$server = "localhost";
$user = "root";
$password = "";
$database = "blog_master";

$db = mysqli_connect($server, $user, $password, $database);

//Setear utf8 através de un query
mysqli_query($db, "SET NAME 'utf8'");

//Iniciar sesión para enviar información entre páginas
if(!isset($_SESSION)){
    session_start();
}


