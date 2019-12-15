<?php
session_start();
if(isset($_SESSION['notas'])){
    session_destroy();
}
header('Location: estructura.php');
?>