<?php
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$base = 'proyectophp';
$parametros = mysqli_connect($servidor, $usuario, $password, $base);
mysqli_query($parametros, "SET NAMES 'utf8'");
if(!isset($_SESSION)){
    session_start();
}
?>