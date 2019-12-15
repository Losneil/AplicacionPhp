<?php
require_once 'conexion.php';

if(isset($_SESSION['notas']) && isset($_GET['id'])){
    $id_entrada = $_GET['id'];
    $id_usuario = $_SESSION['notas']['id'];
    $sql = "DELETE FROM entradas WHERE id_usuario = $id_usuario AND id = $id_entrada";
    mysqli_query($parametros, $sql);
}
header("Location: estructura.php");
?>