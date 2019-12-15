<?php
if(isset($_POST)){
    require_once 'conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($parametros, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($parametros, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($parametros, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($parametros, $_POST['password']) : false;

    $errores = array();

    //validar campo de nombres
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }
    else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    //validar campo de apellidos
    if(!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)){
        $apellido_validado = true;
    }
    else{
        $apellido_validado = false;
        $errores['apellido'] = "El apellido no es valido";
    }

    //validar campo de email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }
    else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    //validar campo de contraseña
    if(!empty($password)){
        $password_validado = true;
    }
    else{
        $password_validado = false;
        $errores['password'] = "La contraseña esta vacia";
    }

    //guardar usuario sin errores
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        $password_seguro = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
        /*var_dump($password);
        var_dump($password_seguro);
        var_dump(password_verify($password, $password_seguro));
        die();*/
        $sql = "INSERT INTO notas VALUES(null, '$nombre', '$apellido', '$email', '$password_seguro')";
        $guardar = mysqli_query($parametros, $sql);
        /*var_dump(mysqli_error($parametros));
        die();*/
        if($guardar){
            $_SESSION['completado'] = "Registro guardado correctamente";
        }
        else{
            $_SESSION['errores']['general'] = "Error al guardar";
        } 
    }
    else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: estructura.php');
?>