<?php
include_once("../../bd/conexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Obtener las variables del formulario
$radicado = $_POST['radicado'];
$respuesta = $_POST['respuesta'];

// Consulta SQL para verificar si el usuario existe
$query_check_user = "SELECT * FROM respuestas WHERE radicado = '$radicado'";
$result_check_user = $db_connection->query($query_check_user);

while ($row = $result_check_user->fetch_assoc()) {
    $correo = $row['correo'];
    $asunto = $row['asunto'];
}

$query_user = "SELECT * FROM usuarios WHERE correo = '$correo'";
$result_user = $db_connection->query($query_user);

while ($row = $result_user->fetch_assoc()) {
    $usuario = $row['usuario'];
}

// Verificar si el usuario existe
if ($result_check_user->num_rows > 0) {
    // El usuario existe, proceder con la actualización de la contraseña
    $query_update_password = "UPDATE respuestas SET estado = '$respuesta' WHERE radicado = '$radicado'";
    $result_update_password = $db_connection->query($query_update_password);
    
    if ($result_update_password) {
        // Configurar PHPMailer para enviar el correo
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'crodrigueza21@curnvirtual.edu.co'; // Tu dirección de correo electrónico de Gmail
        $mail->Password = 'cnmxriomtqjtaodn'; // Tu contraseña de Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $to = $correo; // Dirección de correo del destinatario
        $subject = "CONSULTA DEL CE CURN RESPONDIDA"; // Asunto del correo

        // Contenido del correo en formato HTML
        $message = "<html><body>";
        $message .= "<p>Hola, $usuario</p>";
        $message .= "<p>Tu consulta a sido respondida</p>";
        $message .= "<p>Radicado: $radicado</p>";
        $message .= "<p>Respuesta:$respuesta </p>";
        $message .= "</body></html>";

        // Establecer el destinatario, asunto, cuerpo y remitente del correo electrónico
        $mail->setFrom('crodrigueza21@curnvirtual.edu.co', 'CE CURN');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        // Envía el correo electrónico
        if ($mail->send()) {
           
             header("Location: consultorioAsesor.php?succces=1");
            exit();
        } else {
            echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
        }
    } else {
        echo "Error al actualizar la contraseña: " . $db_connection->error;
    }
} else {
    // El usuario no existe, mostrar un mensaje de error
    echo "El usuario no existe. Por favor, verifique el nombre de usuario.";
    header("Location: consultorioAsesor.php?errorActualizar=1");
    exit();
}

// Cerrar la conexión
$db_connection->close();
?>
