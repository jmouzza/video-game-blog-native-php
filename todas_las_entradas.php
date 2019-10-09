<?php include_once 'includes/cabecera.php'; ?>
<?php include_once 'includes/lateral.php'; ?>

<!--Contenido principal-->
<div id="principal">
    <h1>Todas las entradas</h1>
    <?php 
        $conseguirEntradas = conseguirEntradas($db);
        while($entrada = mysqli_fetch_assoc($conseguirEntradas)):
    ?>
    <article class="entrada">
        <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2><?=$entrada['titulo']?></h2>
            <p class="fecha_categoria"><?=$entrada['categoria']. " | ".$entrada['fecha']. " | ".$entrada['autor']?></p>
            <p> <?=$entrada['descripcion']."<strong style='color:blue'>...</strong>"?></p>
        </a>
    </article>
    <?php endwhile; ?>
    
  
</div>
            
<?php include_once 'includes/pie.php';?>