<!--Sidebar-->
    <aside id="sidebar">
        <div id="buscar" class="bloque">
            <h3>Buscar</h3>
            <form action="buscar.php" method="POST">
                <input type="text" name="buscar" placeholder="¿Qué buscas?"/>
                <input type="submit" name="submit" value="Buscar"/>
            </form>
        </div>
                
                <?php if(isset($_SESSION['usuario'])) :?>
                    <div class="bloque login">
                        <h3> Hola, <?= $_SESSION['usuario']['nombre']?></h3>
                        <a href="crear_entrada.php" id='crear_entrada' class='botones'>Crear entrada</a>
                        <a href="crear_categoria.php" id='crear_categoria' class='botones'>Crear categoría</a>
                        <a href="mis_datos.php" id='mis_datos' class='botones'>Mis datos</a>
                        <a href="actions/logout.php" id='cerrar_sesion' class='botones'>Cerrar Sesión</a>
                    </div>
                <?php elseif(!isset($_SESSION['usuario'])) :?>
                    <div  class="bloque">
                    <h3>Ingresar</h3>
                    <?php if(isset($_SESSION['error_login'])): ?>
                    <div class='error_registro'>
                            <h4><?=$_SESSION['error_login']?></h4>
                    </div>
                    <?php elseif(isset($_SESSION['sin_registro'])): ?>
                        <div class='error_registro'>
                            <h4><?=$_SESSION['sin_registro']?></h4>
                        </div>
                    <?php endif;?>
                    <form action="actions/login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        <label for="password">Password</label>
                        <input type="password" name="password"/>
                        <input type="submit" name="submit" value="Entrar"/>
                    </form>
                    </div>
                    <div id="register" class="bloque">
                    <h3>Regístrate</h3>
                    <?php if(isset($_SESSION['registro_completo'])):?>
                    <div id="registro_completo">
                        <?=$_SESSION['registro_completo']?>
                    </div>
                    <?php elseif (isset($_SESSION['registro_incompleto'])):?>
                    <div id="registro_incompleto">
                        <?=$_SESSION['registro_incompleto']?>
                    </div>
                    <?php endif;?>
                        <form action="actions/registro.php" method="POST">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre"/>
                            <?php if(isset($_SESSION['errores']['nombre'])):?>
                                <?php echo "<div class='error_registro'>".$_SESSION['errores']['nombre']."</div>";?>
                            <?php endif;?>
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos"/>
                            <?php if(isset($_SESSION['errores']['apellidos'])):?>
                                <?php echo "<div class='error_registro'>".$_SESSION['errores']['apellidos']."</div>";?>
                            <?php endif;?>
                            <label for="email">Email</label>
                            <input type="email" name="email"/>
                            <?php if(isset($_SESSION['errores']['email'])):?>
                                <?php echo "<div class='error_registro'>".$_SESSION['errores']['email']."</div>";?>
                            <?php endif;?>
                            <label for="password">Password</label>
                            <input type="password" name="password"/>
                            <?php if(isset($_SESSION['errores']['password'])):?>
                                <?php echo "<div class='error_registro'>".$_SESSION['errores']['password']."</div>";?>
                            <?php endif;?>
                            <!--
                            <?php // if(isset($_SESSION)):?>
                            <?php //  session_destroy();?>
                            <?php // endif;?>
                            -->
                            <input type="submit" name="submit" value="Entrar"/>
                        </form>
                    </div>
                <?php endif;?>
                
            </aside>