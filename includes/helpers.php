<?php


function mostrarError($errores, $campo){
    $alert = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alert = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    
    return $alert;
    
}


function borrarErrores(){
    $borrado = false;
    
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = true;
    }
    
     if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }
    
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        $borrado = true;
    }
   
    return $borrado;
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $result = $categorias;
    }
    
    return $result;
}

function conseguirUnaCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias WHERE id='$id';";
    $categoria = mysqli_query($conexion, $sql);
    
    $result = array();
    if($categoria && mysqli_num_rows($categoria) >= 1){
        $result =  mysqli_fetch_assoc($categoria);
    }
    
    return $result;
}

function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradas e ". "INNER JOIN categorias c ON e.categoria_id = c.id ".
        "INNER JOIN usuarios u ON E.usuario_id = u.id " .
        "WHERE e.id = '$id' ;";
    
    $entrada = mysqli_query($conexion, $sql);
    
    $resultado = array();
    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}

/* Por defecto sera cuatro. Null para traer todas las entradas */
function conseguirUltimasEntradas($conexion, $limit = 'LIMIT 4', $categoria = null, $busqueda=null){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
        "INNER JOIN categorias c ON E.categoria_id = c.id ";
        
    
    if(!empty($categoria)){
        $sql .= "WHERE e.categoria_id = '$categoria' ";
    }
    
    if(!empty($busqueda)){
        $sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
    }
    
    $sql .= "ORDER BY e.id DESC ";
    
    if($limit){
        $sql .= $limit;
    }
    
    $entradas = mysqli_query($conexion, $sql);
    
    $resultado = array();
    
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
    
    return $entradas;
}