<?php
// Mostrar errores PHP para debug mientras probás localmente
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Rutas absolutas relativas al archivo actual (evita problemas de ../)
require __DIR__ . '/../PHPMailer/src/Exception.php';
require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Acceso inválido (usar POST)']);
    exit;
}

// Recibir datos
$firstName     = $_POST['firstName'] ?? '';
$lastName      = $_POST['lastName'] ?? '';
$email         = $_POST['email'] ?? '';
$phone         = $_POST['phone'] ?? '';
$address       = $_POST['address'] ?? '';
$subject       = $_POST['subject'] ?? '';
$message       = $_POST['message'] ?? '';
$paymentMethod = $_POST['paymentMethod'] ?? '';
$total         = $_POST['total'] ?? 0;
$services      = isset($_POST['services']) ? (is_array($_POST['services']) ? implode(', ', $_POST['services']) : $_POST['services']) : 'Ninguno';

// Validación básica
if (empty($firstName) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Por favor complete Nombre, Email y Mensaje.']);
    exit;
}

$mail = new PHPMailer(true);

try {
    // SMTP - usar la configuración que ya probó en tu "correo de prueba"
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'estudiojuridicogondallier@gmail.com';     // tu cuenta que funciona
    $mail->Password   = 'jvvnjolgrtryburk';                       // contraseña de aplicación SIN espacios
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Remitente y destinatario
    $mail->setFrom('estudiojuridicogondallier@gmail.com', 'Formulario Web - Estudio');
    $mail->addAddress('estudiojuridicogondallier@gmail.com'); // donde querés recibir

    $mail->isHTML(true);
    $mail->Subject = "Nueva consulta - {$firstName} {$lastName}";

    $mail->Body = "<div style='background:#f4f4f4; padding:25px; font-family:Arial, sans-serif;'>
    <div style='max-width:600px; margin:auto; background:#ffffff; border-radius:12px; padding:25px; 
        box-shadow:0 4px 15px rgba(0,0,0,0.1);'>

        <h2 style='color:#2b4c7e; text-align:center; margin-bottom:20px;'>
            📩 Nueva consulta desde la web
        </h2>

        <div style='border-top:2px solid #2b4c7e; padding-top:15px; margin-top:10px;'>
            <h3 style='color:#2b4c7e;'>👤 Datos del consultante</h3>
            <p><strong>Nombre:</strong> {$firstName} {$lastName}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Teléfono:</strong> {$phone}</p>
            <p><strong>Dirección:</strong> {$address}</p>
        </div>

        <div style='border-top:2px solid #2b4c7e; padding-top:15px; margin-top:15px;'>
            <h3 style='color:#2b4c7e;'>📌 Detalles de la consulta</h3>
            <p><strong>Asunto:</strong> {$subject}</p>
            <p><strong>Servicios solicitados:</strong> {$services}</p>
            <p><strong>Método de pago:</strong> {$paymentMethod}</p>
            <p><strong>Total estimado:</strong> <span style='color:#28a745; font-weight:bold;'>\${$total}</span></p>
        </div>

        <div style='border-top:2px solid #2b4c7e; padding-top:15px; margin-top:15px;'>
            <h3 style='color:#2b4c7e;'>📝 Mensaje del cliente</h3>
            <div style='background:#f9f9f9; padding:12px 15px; border-radius:8px; 
                border-left:4px solid #2b4c7e;'>
                <p style='white-space:pre-line;'>{$message}</p>
            </div>
        </div>

        <p style='margin-top:25px; text-align:center; color:#777; font-size:13px;'>
            Estudio Jurídico Barreyro & Gondallier<br>
            Este mensaje fue enviado automáticamente desde el formulario web.
        </p>
    
    ";/* ================================================
   ✔️ 1) CORREO QUE RECIBE EL ESTUDIO 
   ================================================ */
$mail->send();

/* ================================================
   ✔️ 2) CORREO PARA EL USUARIO
   ================================================ */
$mail->clearAddresses();
$mail->addAddress($email); // correo del usuario

$mail->Subject = "Confirmación de consulta - Estudio Jurídico Barreyro & Gondallier";
$mail->Body = "
<div style='font-family: Arial; padding:20px'>
    <h2>📬 Gracias por tu consulta, {$firstName}</h2>

    <p>Recibimos tu consulta correctamente. En breve un profesional se comunicará con vos.</p>

    <h3>📝 Resumen de tu consulta</h3>
    <p><strong>Nombre:</strong> {$firstName} {$lastName}</p>
    <p><strong>Asunto:</strong> {$subject}</p>
    <p><strong>Servicios seleccionados:</strong> {$services}</p>
    <p><strong>Método de pago elegido:</strong> {$paymentMethod}</p>
    <p><strong>Total estimado:</strong> <strong>\${$total}</strong></p>

    <h3>Mensaje enviado:</h3>
    <div style='background:#f1f1f1; padding:15px; border-radius:8px;'>
        {$message}
    </div>

    <h3>💳 Información para el pago</h3>
    <ul>
        <li>Alias: <strong>estudio.juridico.mp</strong></li>
        <li>CBU: <strong>000000000000000000000</strong></li>
    </ul>

    <p>Muchas gracias por confiar en nosotros.<br>
    <strong>Estudio Jurídico Barreyro & Gondallier</strong></p>
</div>
";

$mail->send();

/* ================================================
   ✔️ RESPUESTA AL FRONTEND
   ================================================ */
echo json_encode(['success' => true, 'message' => 'Consulta enviada correctamente a ambas partes.']);
exit;

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Excepción: ' . $mail->ErrorInfo]);
}
