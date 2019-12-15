<?php require_once 'redireccion.php'?>
<?php require_once 'cabecera.php'; ?>
<div id="contenedor">
    <?php require_once 'lateral.php'; ?>
    <div id="principal">
    <h1>Crear categorias</h1>
        <form action="savecate.php" method="POST">
            <label for="nomcat">Nombre de la categoria:</label>
            <input type="text" name="nomcat" />
            <input type="submit" value="Guardar" />
        </form>
    </div>
    <div class="clearfix"></div>
</div>
<?php require_once 'pie.php'; ?>