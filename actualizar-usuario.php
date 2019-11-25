<?php require_once 'includes/conexion.php'; ?>

<?php

if(isset($_POST)){
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

    // Array de errores
    $errores = array();
    
    // Validar los datos antes de guardarlos en la Base de Datos
    
    // Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre no es válido';
    }
    
    // Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = 'El apellido no es válido';
    }
    
    // Validar email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = 'El email no es válido';
    }

    
    // Solo insertar un nuevo registro en la base de datos
    // cuando no haya ningún error
    
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        
        // Comprobar si el email ya existe
        
        $query = "SELECT id, email FROM usuarios WHERE email = '$email';";
        
        $isset_email = mysqli_query($db, $query);
        //Lo convierte la consulta en un array asociativo
        $isset_user = mysqli_fetch_assoc($isset_email);
        
        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
            // Actualizar el usuario
            $usuario = $_SESSION['usuario'];
            $sql = "UPDATE usuarios SET " . 
                "nombre = '$nombre', "  .
                "apellidos = '$apellidos', " .
                "email = '$email' " .
                "WHERE id = '{$usuario['id']}';";

            $query = mysqli_query($db, $sql);

            // insertar usuario en su tabla correspondiente
            if($sql){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = 'Tus datos se han actualizado con éxito';
            }else{
                $_SESSION['errores']['general'] = 'Fallo al actualizar tus datos!';
            }
        }else{
            $_SESSION['errores']['general'] = 'El usuario ya existe!';
        }
        
            
    }else{
        $_SESSION['errores'] = $errores;
        
    }
}
header('Location: mis-datos.php');
