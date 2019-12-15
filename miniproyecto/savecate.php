<?php
if(isset($_POST)){
    require_once 'conexion.php';

    $nombre = isset($_POST['nomcat']) ? mysqli_real_escape_string($parametros, $_POST['nomcat']) : false;
    $errores = array();
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nomcat'] = "El nombre de la categoria no es valido";
    }
    
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $guardar = mysqli_query($parametros, $sql);
    }
}
header("Location: estructura.php"); 
?>