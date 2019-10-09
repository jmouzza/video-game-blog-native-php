<?php
require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';
$entradaEncontrada = editarEntrada($db, $_GET['id']);
if(!isset($entradaEncontrada)){
    header('Location: index.php');
}
?>
<div id="principal">
    <h2>Editar Entrada</h2>
    
    <form action="actions/update_entrada.php?id=<?= $entradaEncontrada['id']?>" method="POST">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" value="<?= $entradaEncontrada['titulo']?>"/>
        <?php if(isset($_SESSION['error_update_titulo'])){
         echo $_SESSION['errores']['error_update_descripcion'];
        }
        ?>
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" value="<?= $entradaEncontrada['descripcion']?>"/>
        <?php if(isset($_SESSION['error_update_descripcion'])){
            echo $_SESSION['errores']['error_update_descripcion'];
        }
        ?>
        <?php if(isset($_SESSION['entrada_actualizada'])){
            echo '<p class="mensaje_categoria">'.$_SESSION['entrada_actualizada'].'</p>';
            unset($_SESSION['entrada_actualizada']);
        }
        ?>    
        <input type="submit" value="Actualizar Entrada"/>
    </form>
</div>
<?php require_once './includes/pie.php';?>