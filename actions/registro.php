<?php

if(isset($_POST)){
    //Conexión a la base de datos
        require_once '../includes/conexion.php';
    //Iniciar sesión en caso que no este iniciada
        if(!isset($_SESSION)){
            session_start();
        }
    //Recoger los valores del formulario y almacenarlo en variables
    
    //Operador ternario para una primera validación
    /*
    Se lee:
    si hay algo dentro de $_POST['nombre'] (? entonces) interpreta como string el valor y asignalo a $nombre (: sino) asigna el segundo valor
     */
                        //función que permite escapar cualquier dato a string
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db,trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
    
    //Array de posibles errores en las validaciones
    $errores = array(); //se define como un array vacio, en cual se llenará si alguna validación no cumple
    
    //Validar los datos antes de guardarlos en la base de datos
    
    /*----- Validando el nombre -----*/
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre ingresado no es válido"; // añadir un indice al array de errores
    }
    
    /*----- Validando los apellidos -----*/
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos ingresados no son válidos";
    }
    
    /*----- Validando el email -----*/
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email ingresado no es válido";
    }
    
    /*----- Validando la password -----*/
    if(!empty($password)){
        $password_validado = true;
        //Cifrar la contraseña, ya que guardar las contraseñas en limpio es ilegal
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        // función para cifrar(password_hash) 
            //1er parámetro la contraseña recibida por $_POST
            //2do parámetro Tipo de cifrado a realizar (utilizaremos PASSWORD_BCRYPT
            //3er parámetro un array con el cost donde se le indicara la cantidad de veces que a cifrar.
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña está vacía"; 
    }
    
    //Se realiza un conteo de la variable $errores, sino tiene contenido podrá guardar los datos en la base de datos
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        //INSERTAR USUARIO EN LA BASE DE DATOS DESDE PHP mysqli_query();
        // guardar la sentencia (consulta/query) en una variable
        $query = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";
        $usuario_guardado = mysqli_query($db, $query);
                
        if($usuario_guardado){
            $_SESSION['registro_completo'] = 'Registro exitoso';
        }else {
            $_SESSION['registro_incompleto'] = 'Fallo al guardar el usuario';
        }
    }else{
        //Existen errores, se redirecciona con header al index para enviar el error a través de $_SESSION.
        $_SESSION['errores'] = $errores;
        $_SESSION['registro_incompleto'] = 'Fallo al guardar el usuario';
    }
}
header('Location: ../index.php'); //Se redirecciona y al tener la sesión iniciada se envian datos a través de $_SESSION
