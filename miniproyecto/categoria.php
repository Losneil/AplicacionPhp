<?php require_once 'conexion.php';?>
<?php require_once 'ayudas.php';?>
<?php
    $categoria_actual = listarCategorias($parametros, $_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location: estructura.php");
    } 
?>
<?php require_once 'cabecera.php'?>

    <!--CONTENEDOR DE LAS BARRAS LATERALES-->
    <div id="contenedor">

        <?php require_once 'lateral.php'?>
        
        <div id="principal">
            <h1>Peliculas de <?=$categoria_actual['nomcat']?></h1>
            <?php
                $entradas = listarEntradas($parametros, null, $_GET['id']);
                if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                while($entrada = mysqli_fetch_assoc($entradas)):
            ?>   
                <article class="entrada">
                <a href="infoentrada.php?id=<?=$entrada['id']?>">
                <h2><?=$entrada['titulo']?></h2>
                <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                <p><?=$entrada['descripcion']?></p>
                </a>
                </article>
            <?php
                endwhile;
                else:
            ?>
            <div class="alerta alerta-error">No hay peliculas en esta categoria</div>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>

    </div>

<?php require_once 'pie.php' ?>