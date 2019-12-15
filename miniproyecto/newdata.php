<?php
if(isset($_POST)){
    require_once 'conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }
    
    //Recoger valores del formalario de actualizacion
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($parametros, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($parametros, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($parametros, trim($_POST['email'])) : false;

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

    //guardar usuario sin errores
    $guardar_usuario = false;

    if(count($errores) == 0){
        $usuario = $_SESSION['notas'];
        $guardar_usuario = true;

        //Comprobar si hay un usuario existente
        $sql = "SELECT id, email FROM notas WHERE email = '$email'";
        $email_existente = mysqli_query($parametros, $sql);
        $user_existente = mysqli_fetch_assoc($email_existente);
        
        if($user_existente['id'] == $usuario['id'] || empty($user_existente) ){

            //Actualizar los datos del usuario
            $sql = "UPDATE notas SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($parametros, $sql);

            if($guardar){
                $_SESSION['notas']['nombre'] = $nombre;
                $_SESSION['notas']['apellido'] = $apellido;
                $_SESSION['notas']['email'] = $email;
                $_SESSION['completado'] = "Tus datos se han actualizado correctamente";
            }
            else{
                $_SESSION['errores']['general'] = "Error al actualizar datos";
            }  
        } 
        else{
            $_SESSION['errores']['general'] = "El usuario con ese email ya existe";
        }   
    }
    else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: datos.php');
?>