<?php
if(isset($_POST)){
    require_once 'conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($parametros, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($parametros, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['notas']['id'];

    $errores = array();
    if(empty($titulo)){
        $errores['titulo'] = "Se requiere un titulo valido";
    }

    if(empty($descripcion)){
        $errores['descripcion'] = "Se requiere una descripción válida";
    }

    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = "La categoria no es válida";
    }

    if(count($errores) == 0){
        if(isset($_GET['editar'])){
            $id_entrada = $_GET['editar'];
            $id_usuario = $_SESSION['notas']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', id_categoria=$categoria WHERE id = $id_entrada AND id_usuario = $id_usuario";
        }
        else{
            $sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($parametros, $sql);
        header("Location: estructura.php"); 
    }
    else{
        $_SESSION['erroresentry'] = $errores;
        if(isset($_GET['editar'])){
            header("Location: newentry.php?id=".$_GET['editar']);
        }
        else{
            header("Location: newentry.php");
        }
    }
}
?>