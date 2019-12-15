<?php require_once 'redireccion.php';?>
<?php require_once 'conexion.php';?>
<?php require_once 'ayudas.php';?>
<?php
    $entrada_actual = verInfoEntrada($parametros, $_GET['id']);
    if(!isset($entrada_actual['id'])){
        header("Location: estructura.php");
    } 
?>
<?php require_once 'cabecera.php'?>

    <!--CONTENEDOR DE LAS BARRAS LATERALES-->
    <div id="contenedor">
        <?php require_once 'lateral.php'?>
        
        <div id="principal">
        <h1>Editar entradas</h1>
        <h3>Edita tu entrada <?=$entrada_actual['titulo']?></h3><br>
        <form action="saveentry.php?editar=<?=$entrada_actual['id']?>" method="POST">
            <label for="titulo">Titulo de la entrada:</label>
            <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
            <?php echo isset($_SESSION['erroresentry']) ? mostrarError($_SESSION['erroresentry'], 'titulo') : ''; ?>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
            <?php echo isset($_SESSION['erroresentry']) ? mostrarError($_SESSION['erroresentry'], 'descripcion') : ''; ?>
            <label for="categoria">Selecione la categoria:</label>
            <select name="categoria">
                <?php 
                    $categorias = mostrarCategorias($parametros);
                    if(!empty($categorias)) :
                    while($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['id_categoria']) ? 'selected="selected"' : '' ?> >
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

<?php require_once 'pie.php';?>