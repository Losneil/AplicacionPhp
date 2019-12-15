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
            <h1><?=$entrada_actual['titulo']?></h1>
            <a href="categoria.php?id=<?=$entrada_actual['id_categoria']?>">
            <h2><?=$entrada_actual['categoria']?></h2>
            </a>
            <h4>Fecha de estreno: <?=$entrada_actual['fecha']?> | Esta entrada fue creada por <?=$entrada_actual['nota'] ?></h4>
            <p><?=$entrada_actual['descripcion']?></p>
            <?php if(isset($_SESSION['notas']) && $_SESSION['notas']['id'] == $entrada_actual['id_usuario']): ?>
            <a href="editentry.php?id=<?=$entrada_actual['id']?>" class="boton mostrar">Editar entrada</a>
            <a href="dropentry.php?id=<?=$entrada_actual['id']?>" class="boton cerrar">Borrar entrada</a>
            <?php endif; ?>   
        </div>
        <div class="clearfix"></div>

    </div>

<?php require_once 'pie.php';?>