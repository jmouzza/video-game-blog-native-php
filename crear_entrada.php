<?php
require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';
?>
<div id="principal">
    <h2>Crear Entrada</h2>
    <?php if(isset($_SESSION['entrada_guardada'])):?>
        <p class="mensaje_categoria"><?=$_SESSION['entrada_guardada']?></p>
        <?php unset($_SESSION['entrada_guardada'])?>
    <?php endif;?>
    <?php if(isset($_SESSION['entrada_campo_vacio'])):?>
        <p class="mensaje_categoria"><?=$_SESSION['entrada_campo_vacio']?></p>
        <?php unset($_SESSION['entrada_campo_vacio'])?>
    <?php endif;?>
    <form action="actions/guardar_entrada.php" method="POST">
        <label for="titulo">Titulo Entrada</label>
        <input type="text" name="titulo"/>
        <label for="descripcion">Descripción entrada</label>
        <textarea type="text" name="descripcion"></textarea>
        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
            </option>    
            <?php endwhile;?>
            <?php endif;?>
        </select>
        <input type="submit" value="CREAR ENTRADA"/>
    </form>
   
</div>
<?php require_once './includes/pie.php';?>
