<?php
require_once 'ayudas.php'; 
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <title>Movie's & series blog</title>
</head>
<body>
    <!--CABECERA-->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">
                <b>Movies & series blog</b>
            </a>   
        </div>
        <nav id="menu">
            <ul>
                <li><a href="estructura.php">Home</a></li>
                <?php 
                    $categorias = mostrarCategorias($parametros);
                    if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)): 
                ?>
                    <li><a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nomcat']?></a></li>
                <?php  
                    endwhile; 
                    endif; 
                ?>
                <li><a href="acercade.php">About me</a></li>
                <li><a href="contacto.php">Contacts</a></li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>