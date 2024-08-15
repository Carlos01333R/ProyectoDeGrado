<?php
include_once("../../bd/conexion.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Obtener las variables del formulario


require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';


$usuario = $_POST['usuario'];

// Consulta SQL para verificar si el usuario existe
$query_check_user = "SELECT * FROM usuarios WHERE correo = '$usuario'";
$result_check_user = $db_connection->query($query_check_user);


while ($row = $result_check_user->fetch_assoc()) {

    $nombre = $row['usuario'];
    
    }
function generarNumeroAleatorio() {
    // Genera un número aleatorio de 6 cifras
    $numero = mt_rand(100000, 999999);
    return $numero;
}

$codigo = generarNumeroAleatorio();
// Verificar si el usuario existe
if ($result_check_user->num_rows > 0) {
    // Configurar PHPMailer para utilizar Gmail como servidor SMTP
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'crodrigueza21@curnvirtual.edu.co'; // Tu dirección de correo electrónico de Gmail
    $mail->Password = 'cnmxriomtqjtaodn'; // Tu contraseña de Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $to = $usuario; // Dirección de correo del destinatario
    $subject = "CODIGO CAMBIO DE CONTRASEÑA"; // Asunto del correo

    // Contenido del correo en formato HTML
    $message = "<html><body>";
    $message .= "<p>Hola, $nombre</p>";
    $message .= "<p>SU CODIGO DE VERIFICACION ES <span style='color: red;'>$codigo</span></p>";
    $message .= "</body></html>";

    // Establecer el destinatario, asunto, cuerpo y remitente del correo electrónico
    $mail->setFrom('crodrigueza21@curnvirtual.edu.co', 'CE CURN');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->msgHTML($message);

    // Envía el correo electrónico
    if ($mail->send()) {
        $codigo_encoded = urlencode($codigo);
        $usuario_encoded = urlencode($usuario);
        echo "El correo electrónico se envió correctamente.";
        echo '<form id="postForm" action="cambiarpass.php" method="post">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($codigo) . '">';
        echo '<input type="hidden" name="user" value="' . htmlspecialchars($usuario) . '">';
        echo '</form>';

        // Utilizar JavaScript para enviar automáticamente el formulario
        echo '<script type="text/javascript">';
        echo 'document.getElementById("postForm").submit();';
        echo '</script>';
    } else {
        echo "Hubo un error al enviar el correo electrónico.";
    }
} else {
    // El usuario no existe, mostrar un mensaje de error
    echo "El usuario no existe. Por favor, verifique el nombre de usuario.";
    header("Location: ../../index.php?errorActualizar=1");
    exit();
}


// Cerrar la conexión
$db_connection->close();
?>


