<?php
session_start();
include_once("../../bd/conexion.php");
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Recuperar el valor de $codigo_recuperacion de la sesión
$codigo_recuperacion = $_SESSION['codigo_recuperacion'];

// Recuperar el valor de las otras variables del formulario
$correo = $_POST['usuario'];
$newcontraseña = $_POST['nueva_clave'];
$codigo = $_POST['codigo'];


// Consulta SQL para verificar si el usuario existe
$query_check_user = "SELECT * FROM usuarios WHERE correo = '$correo'";
$result_check_user = $db_connection->query($query_check_user);

if($codigo == $codigo_recuperacion ){
 // Verificar si el usuario existe
if ($result_check_user->num_rows > 0) {
    // El usuario existe, proceder con la actualización de la contraseña
    $query_update_password = "UPDATE usuarios SET contrasena = '$newcontraseña' WHERE correo = '$correo'";
    $result_update_password = $db_connection->query($query_update_password);
    
    if ($result_update_password) {
        header("Location: ../../index.php?succces=1");
    exit();
    } else {
        echo "Error al actualizar la contraseña: " . $db_connection->error;
       
    }
} else {
    // El usuario no existe, mostrar un mensaje de error
    header("Location: ../../index.php?errorActualizar=1");
    exit();
}   
}else{
    header("Location: ../../index.php?erroractualizarpass=1");
    exit(); 
}


// Cerrar la conexión
$db_connection->close();
?>


