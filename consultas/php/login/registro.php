<?php
session_start();
include_once("../../bd/conexion.php");
// Obtener las variables del formulario
$user = $_POST['user'];
$pass = $_POST['pass'];

// Consulta SQL para verificar las credenciales del usuario
$query = "SELECT * FROM usuarios WHERE correo='$user' AND contrasena='$pass'";
$result = $db_connection->query($query);

// Verificar si el usuario y la contraseña son correctos
if ($result->num_rows > 0) {
    
    // Guardar las variables del usuario en sesiones
    $usuario = $result->fetch_assoc(); // Obtener el usuario de la base de datos
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['correo'] = $usuario['correo'];
    header("Location: ../usuario\consultorio.php");
    exit();
    
    // Redireccionar a principal.php
    
} else {
    // Si las credenciales son inválidas, redireccionar a formulario.html
    header("Location: ../../index.php?error=1");
    exit();
}

// Cerrar la conexión
$db_connection->close();

