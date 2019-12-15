<?php require_once 'cabecera.php'?>

    <!--CONTENEDOR DE LAS BARRAS LATERALES-->
    <div id="contenedor">

        <?php require_once 'lateral.php'?>
        
        <div id="principal">
            <h1>Todas las vistas</h1>
            <?php
                $entradas = listarEntradas($parametros);
                if(!empty($entradas)):
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
                endif;
            ?>
        </div>
        <div class="clearfix"></div>

    </div>

<?php require_once 'pie.php' ?>