<?php include_once 'includes/cabecera.php'; ?>
<?php
    $categoria_actual = conseguirCategoria($db, $_GET['id']);
    if(!isset($categoria_actual)){
        header('Location: index.php');
    }
?>
<?php include_once 'includes/lateral.php'; ?>


<!--Contenido principal-->
<div id="principal">
    <h1>Entradas de <?= $categoria_actual['nombre']?></h1>
    <?php 
        $conseguirEntradas = conseguirEntradas($db, null, $_GET['id']);
        if($conseguirEntradas):
        while($entrada = mysqli_fetch_assoc($conseguirEntradas)):
    ?>
    
    
    <article class="entrada">
        <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2><?=$entrada['titulo']?></h2>
            <p class="fecha_categoria"><?=$entrada['categoria']. " | ".$entrada['fecha']. " | ".$entrada['autor']?></p>
            <p> <?=$entrada['descripcion']."<strong style='color:blue'>...</strong>"?></p>
        </a>
    </article>
    <?php 
        endwhile;
        else:
    ?>
    <br/>
    <p>Categoría sin entradas</p>
    <hr/>
    <?php endif;?>
    
  
</div>
            
<?php include_once 'includes/pie.php';?>