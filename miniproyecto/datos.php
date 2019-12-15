<?php require_once 'redireccion.php';?>
<?php require_once 'cabecera.php'; ?>
<div id="contenedor">
    <?php require_once 'lateral.php'; ?>
    <div id="principal">
        <h1>Mis datos</h1>
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
                <form action="newdata.php" method="POST">
                    <!--MOSTRAR ERRORES EN EL CAMPO NOMBRE-->
                    <label for="nombre">Name:</label>
                    <input type="text" name="nombre" value="<?=$_SESSION['notas']['nombre']; ?>" />
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                    <!--MOSTRAR ERRORES EN EL CAMPO DEL APELLIDO-->
                    <label for="apellido">LastName:</label>
                    <input type="text" name="apellido" value="<?=$_SESSION['notas']['apellido']; ?>" />
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>
                    <!--MOSTRAR ERRORES EN EL CAMPO EMAIL-->
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?=$_SESSION['notas']['email']; ?>"/>
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                    <!--MOSTRAR ERRORES EN EL CAMPO CONTRASEÑA-->
                    <!--BOTON PARA CONFIRMAR VALORES-->
                    <input type="submit" name="submit" value="Actualizar"/>
                </form>
        <?php borrarErrores(); ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php require_once 'pie.php'; ?>  