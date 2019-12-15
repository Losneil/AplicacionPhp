<?php
function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) &&  !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
} 
function borrarErrores(){

    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }

    if(isset($_SESSION['erroresentry'])){
        $_SESSION['erroresentry'] = null;
        unset($_SESSION['erroresentry']);
    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }  
    return;
}
function mostrarCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }
    return $resultado;
}
function listarCategorias($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = mysqli_fetch_assoc($categorias);
    }
    return $resultado;
}

function verInfoEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nomcat AS 'categoria', ". 
    "CONCAT (n.nombre, ' ', n.apellido) AS nota FROM entradas e ". 
    "INNER JOIN categorias c ON e.id_categoria = c.id ". 
    "INNER JOIN notas n ON e.id_usuario = n.id ".
    "WHERE e.id = $id";
    $entrada = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}

function listarEntradas($conexion, $limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.nomcat AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.id_categoria = c.id ";
    if(!empty($categoria)){
        $sql .= "WHERE e.id_categoria = $categoria "; 
    }
    if(!empty($busqueda)){
        $sql .= "WHERE e.titulo LIKE '%$busqueda%' "; 
    }
    $sql .= "ORDER BY e.id DESC "; 
    if($limit){
        $sql = "SELECT e.*, c.nomcat AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.id_categoria = c.id ORDER BY e.id DESC LIMIT 5";
    }
    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
    return $resultado;
}
?>