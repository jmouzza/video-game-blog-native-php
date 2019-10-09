<?php
require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';
?>
<div id="principal">
    <h2>Crear Categoría</h2>
    <p>Ingrese el nombre de una categoría para utilizar al realizar una entrada. Verificar que la categoría no exista.</p>
    <br/>
    <?php if(isset($_SESSION['categoria_nueva']) || isset($_SESSION['error_categoria']) || isset($_SESSION['duplicado'])):?>
        <?php if(isset($_SESSION['duplicado'])):?>
            <p class="mensaje_categoria"><?=$_SESSION['duplicado']?></p>
            <?php unset($_SESSION['duplicado']);?>
        <?php elseif(isset($_SESSION['categoria_nueva'])):?>
            <p class="mensaje_categoria"><?=$_SESSION['categoria_nueva']?></p>
            <?php unset($_SESSION['categoria_nueva']);?>
        <?php elseif(isset($_SESSION['error_categoria'])):?>
            <p class="mensaje_categoria"><?=$_SESSION['error_categoria']?></p>
            <?php unset($_SESSION['error_categoria']);?>
        <?php endif;?>
        
    <?php endif;?>    
    <form action="actions/guardar_categoria.php" method="POST">
        <label for="categoriaNueva">Nombre de categoría</label>
        <input type="text" name="categoriaNueva"/> 
        <input type="submit" value="CREAR CATEGORIA"/>
    </form>
   
</div>

<?php require_once './includes/pie.php';?>