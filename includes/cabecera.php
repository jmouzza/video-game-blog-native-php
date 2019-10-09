<?php include_once 'conexion.php';?>
<?php include_once 'helpers.php';?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Blog de Videojuegos</title>
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css"/>
    </head>
    <body>
        <!--Cabecera-->
        <header id="cabecera">
            
            <!--Logo-->
            <div id="logo">
                <div class="contenedor">
                    <a href="index.php">
                        <img src="http://localhost/master-php/proyecto-blog-videojuegos-php/assets/img/LOGO.png"/>
                    </a>
                </div>
            </div>
        
            <!--Menú-->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="todas_las_entradas.php">Todo</a>
                    </li>
                    <?php
                        $categorias = conseguirCategorias($db);
                        while($categoria = mysqli_fetch_assoc($categorias)):                                
                    ?>
                    <li>
                        <a href="categoria.php?id=<?= $categoria['id']?>"><?=$categoria['nombre']?></a>
                    </li>
                    <?php endwhile;?> 
                    
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        <div id="contenedor">