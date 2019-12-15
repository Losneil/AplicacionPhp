<?php
require_once 'conexion.php';

if(isset($_POST)){
    if(isset($_SESSION['errorlogin'])){
        $_SESSION['errorlogin'];
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT * FROM notas WHERE email = '$email'";
    $login = mysqli_query($parametros, $sql);

    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        /*var_dump($usuario);
        die();*/
        //$password_seguro = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
        /*var_dump($password_seguro);
        die();*/
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            $_SESSION['notas'] = $usuario;
            $_SESSION['loginvalido'] = "Login correcto";
        }
        else{
            $_SESSION['errorlogin'] = "Login incorrecto";
        }
    }
    else{
        $_SESSION['errorlogin'] = "Login incorrecto"; 
    }
}
header('Location: estructura.php');
?>