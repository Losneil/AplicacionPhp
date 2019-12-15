        <aside id="barra">
            <!--BUSCADOR EN EL BLOG-->
            <div id="buscador" class="bloque">
                <h3>Buscador</h3>
                <form action="buscar.php" method="POST">
                    <input type="text" name="busqueda"/>
                    <input type="submit" value="Buscar"/>
                </form>
            </div>

            <!--LOGIN VALIDADO Y GESTION DE EVENTOS-->
            <?php if(isset($_SESSION['notas'])): ?>
                <div class="bloque">
                    <h4>Bienvenido <?=$_SESSION['notas']['nombre'].' '.$_SESSION['notas']['apellido']; ?></h4>
                    <a href="newentry.php" class="boton entradas">Crear entradas</a>
                    <a href="newcate.php" class="boton categorias">Crear categorias</a>
                    <a href="datos.php" class="boton mostrar">Mostar datos</a>
                    <a href="close.php" class="boton cerrar">Cerrar Sesión</a>
                </div> 
            <?php endif; ?>
            <!--BARRA LATERAL DEL LOGIN-->
            <?php if(!isset($_SESSION['notas'])): ?>
            <div id="ingreso" class="bloque">
                <h3>Login</h3>
            <!--MENSAJE DE ERROR AL NO LOGUEARSE CORRECTAMENTE-->
            <?php if(isset($_SESSION['errorlogin'])): ?>
                <div class="alerta alerta-error">
                   <?=$_SESSION['errorlogin']; ?>
                </div> 
            <?php elseif(isset($_SESSION['loginvalido'])): ?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['loginvalido']; ?>           
                </div>
            <?php endif; ?>                        
            <!--FORMULARIO DE INGRESO-->
                <form action="login.php" method="POST">
                    <label for="email">Email:</label>
                    <input type="email" name="email"/>
                    <label for="password">Password:</label>
                    <input type="password" name="password"/>
                    <input type="submit" value="Entrar"/>
                </form>
            </div>
            <!--BARRA LETERAL DEL REGISTRO-->
            <div id="registro" class="bloque">
                <h3>Register</h3>
            <!--VALIDACION DEL INGRESO-->
            <?php if(isset($_SESSION['completado'])): ?>
                <div class="alerta alerta-exito">
                    <?=$_SESSION['completado']?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">
                    <?=$_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>    
            <!--FORMULARIO DE INGRESO-->
                <form action="register.php" method="POST">
                    <!--MOSTRAR ERRORES EN EL CAMPO NOMBRE-->
                    <label for="nombre">Name:</label>
                    <input type="text" name="nombre"/>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                    <!--MOSTRAR ERRORES EN EL CAMPO DEL APELLIDO-->
                    <label for="apellido">LastName:</label>
                    <input type="text" name="apellido"/>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
                    <!--MOSTRAR ERRORES EN EL CAMPO EMAIL-->
                    <label for="email">Email:</label>
                    <input type="email" name="email"/>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                    <!--MOSTRAR ERRORES EN EL CAMPO CONTRASEÑA-->
                    <label for="password">Password:</label>
                    <input type="password" name="password"/>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                    <!--BOTON PARA CONFIRMAR VALORES-->
                    <input type="submit" name="submit" value="Confirmar"/>
                </form>
                <?php borrarErrores(); ?>   
            </div>
            <?php endif; ?>
        </aside>