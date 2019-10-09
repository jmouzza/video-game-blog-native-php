<?php
    if(!isset($_POST['buscar'])){
        header('Location: index.php');
    }else{
        $contador = 0;
    }    
?>
<?php include_once 'includes/cabecera.php'; ?>
<?php include_once 'includes/lateral.php'; ?>
<div id="principal">
    <h3 id='resultado_busqueda'>Resultado búsqueda: <span id="busqueda">"<?=$_POST['buscar'] ?>"</span></h3>
    <?php 
        $conseguirEntradas = conseguirEntradas($db, null, null, $_POST['buscar']);
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
        $contador++; 
        endwhile;
        $items_encontrados = $contador;
        echo "<div id='items_encontrados'>Resultado: ".$items_encontrados." Entradas encontradas</div>";
        else:
    ?>
    <br/>
    <p>Búsqueda sin resultado, intenta de nuevo</p>
    <hr/>
    <?php endif;?>
</div>

<?php include_once 'includes/pie.php';?>

