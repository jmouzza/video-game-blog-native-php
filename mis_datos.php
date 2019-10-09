<?php
require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';
?>  
<div id="principal">
    <h2>Actualizar mis datos</h2>
    <?php if(isset($_SESSION['actualizado'])):?>
        <p class="mensaje_categoria"><?= $_SESSION['actualizado'];?></p>
        <?php unset($_SESSION['actualizado']);?>
    <?php elseif(isset($_SESSION['error_al_guardar'])):?>
        <p class='error_registro'><?= $_SESSION['error_al_guardar'];?></p>
        <?php unset($_SESSION['error_al_guardar']);?>
    <?php endif;?>
        <form action="actions/update_usuario.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']?>"/>
        <?php if(isset($_SESSION['errores']['nombre'])):?>
            <p class='error_registro'><?= $_SESSION['errores']['nombre'];?></p>
            <?php unset($_SESSION['errores']['nombre']);?>
        <?php endif;?>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos']?>"/>
        <?php if(isset($_SESSION['errores']['apellidos'])):?>
            <p class='error_registro'><?= $_SESSION['errores']['apellidos'];?></p>
            <?php unset($_SESSION['errores']['apellidos']);?>
        <?php endif;?>
        <input type="submit" value="Actualizar"/>
    </form>
</div>
<?php require_once './includes/pie.php';?>