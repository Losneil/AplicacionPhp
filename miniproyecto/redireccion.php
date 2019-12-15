<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['notas'])){
    header("Location: estructura.php");
}
?>