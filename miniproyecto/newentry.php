<?php require_once 'redireccion.php'; ?>
<?php require_once 'cabecera.php'; ?>
<!--CONTENEDOR DE LA BBARRAS LATERALES-->
<div id="contenedor">
    <?php require_once 'lateral.php'; ?>

    <div id="principal">
    <h1>Crear entradas</h1><br>
        <form action="saveentry.php" method="POST">
            <label for="titulo">Titulo de la entrada:</label>
            <input type="text" name="titulo" />
            <?php echo isset($_SESSION['erroresentry']) ? mostrarError($_SESSION['erroresentry'], 'titulo') : ''; ?>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"></textarea>
            <?php echo isset($_SESSION['erroresentry']) ? mostrarError($_SESSION['erroresentry'], 'descripcion') : ''; ?>
            <label for="categoria">Selecione la categoria:</label>
            <select name="categoria">
                <?php 
                    $categorias = mostrarCategorias($parametros);
                    if(!empty($categorias)) :
                    while($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                <option value="<?=$categoria['id']?>">
                        <?=$categoria['nomcat']?>
                </option>
                <?php
                    endwhile;
                    endif;
                ?>
            </select>
            <?php echo isset($_SESSION['erroresentry']) ? mostrarError($_SESSION['erroresentry'], 'categoria') : ''; ?>
            <input type="submit" value="Guardar" />
        </form>
        <?php borrarErrores(); ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php require_once 'pie.php'; ?>  