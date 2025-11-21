<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    // Tu Gmail
    $mail->Username = 'estudiojuridicogondallier@gmail.com';

    // Contraseña de aplicación SIN ESPACIOS
    $mail->Password = 'jvvnjolgrtryburk';

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('estudiojuridicogondallier@gmail.com', 'Estudio Jurídico Barreyro & Gondallier');
    
    // Donde querés que llegue
    $mail->addAddress('lucianogondallier@gmail.com');

    $mail->Subject = 'Prueba PHPMailer';
    $mail->Body = 'Este es un mensaje enviado con PHPMailer desde XAMPP.';

    $mail->send();
    echo 'Correo enviado correctamente!';
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}
