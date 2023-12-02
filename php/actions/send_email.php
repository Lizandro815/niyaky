<?php
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 2; 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ContactoNiyaky@gmail.com';
        $mail->Password = 'casitani17';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Establecemos 'ContactoNiyaky@gmail.com' como remitente
        $mail->setFrom('ContactoNiyaky@gmail.com', 'Contacto Niyaky');
        
        // Establecemos 'casitaniyaky@gmail.com' como destinatario
        $mail->addAddress('casitaniyaky@gmail.com', 'Nombre del receptor');

        // Modificamos el cuerpo del mensaje para incluir los datos del formulario
        $formattedMessage = "
        <strong>Nombre:</strong> {$userName}<br>
        <strong>Email:</strong> {$userEmail}<br>
        <strong>Asunto:</strong> {$subject}<br>
        <strong>Mensaje:</strong> {$message}
        ";

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $formattedMessage;
        $mail->AltBody = strip_tags($formattedMessage);

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
    }
}
?>
