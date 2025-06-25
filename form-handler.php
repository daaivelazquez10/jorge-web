<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración SMTP de Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nmdevweb@gmail.com';
    $mail->Password = 'nrpm ubwi rruy gfgd';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Remitente y destinatario
    $mail->setFrom('nmdevweb@gmail.com', 'Web Contacto');
    $mail->addAddress('daianavelazquez1995@gmail.com');

    // Asunto y cuerpo
    $mail->Subject = 'Consulta desde la web';
    $mail->Body = "Nombre: {$_POST['nombre']}\nEmail: {$_POST['email']}\nMensaje: {$_POST['consulta']}";

    $mail->send();
    echo "OK";
} catch (Exception $e) {
    http_response_code(500);
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
