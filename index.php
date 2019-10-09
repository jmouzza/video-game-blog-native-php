<?php include_once 'includes/cabecera.php'; ?>
<?php include_once 'includes/lateral.php'; ?>

<!--Contenido principal-->
<div id="principal">
    <h1>Últimas entradas</h1>
    <?php 
        $ultimasEntradas = conseguirEntradas($db, true, null);
        while($entrada = mysqli_fetch_assoc($ultimasEntradas)):
    ?>
    <article class="entrada">
        <a href="entrada.php?id=<?=$entrada['id']?>">
            <h2><?=$entrada['titulo']?></h2>
            <p class="fecha_categoria"><?=$entrada['categoria']. " | ".$entrada['fecha']. " | ".$entrada['autor']?></p>
            <p> <?=$entrada['descripcion']."<strong style='color:blue'>...</strong>"?></p>
        </a>
    </article>
    <?php endwhile; ?>
    
    <div id="ver-todas">
        <a href="todas_las_entradas.php">Ver todas las entradas</a>
    </div>
</div>
            
<?php include_once 'includes/pie.php';?>