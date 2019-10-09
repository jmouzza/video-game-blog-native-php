<?php
require_once './includes/redireccion.php';
require_once './includes/cabecera.php';
require_once './includes/lateral.php';
?>
<div id="principal">
  <?php if(isset($_SESSION['entrada_eliminada'])): ?>
    <h1><?=$_SESSION['entrada_eliminada']?></h1>
  <?php else:?>
    <h2>Ocurrió un error al eliminar la entrada, vuelve a intentarlo.</h2>
  <?php endif;?>
    
</div>
<?php require_once './includes/pie.php';?>