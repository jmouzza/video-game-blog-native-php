<?php include_once 'includes/cabecera.php'; ?>
<?php include_once 'includes/lateral.php'; ?>
<?php 
    $entrada = mostrarEntrada($db, $_GET['id']);
    $objeto_entrada = mysqli_fetch_assoc($entrada);
    if(!isset($objeto_entrada)){
        header('Location: index.php');
    }
?>
<!--Contenido principal-->
<div id="principal">
    <h1 id='titulo_entrada'><?= $objeto_entrada['titulo']?></h1>
    <h4 class="datos_entrada">Categoría: <?= $objeto_entrada['categoria']?></h4>
    <h4 class="datos_entrada">Autor: <?= $objeto_entrada['autor']?></h4>
    
    <p id='descripcion_entrada'><?= $objeto_entrada['descripcion']?></p> 
<?php if(isset($_SESSION['usuario'])):?>
    <?php if($_SESSION['usuario']['id'] == $objeto_entrada['usuario_id']): ?>
        <div id="editar_entrada">
            <a href="editar_entrada.php?id=<?=$objeto_entrada['id']?>">Editar entrada</a>
        </div>
        <div id="eliminar_entrada">
            <a href="actions/eliminar_entrada.php?id=<?=$objeto_entrada['id']?>">Eliminar entrada</a>
        </div>
    <?php endif;?>
<?php endif;?>
</div>
         
<?php include_once 'includes/pie.php';?>