<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: text/html; charset=UTF-8');

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Datos del Formulario capturando data
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$telefono = htmlspecialchars($_POST['telefono'], ENT_QUOTES, 'UTF-8');
$message_content = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

// Configuración del servidor de correo
$mail = new PHPMailer(true);
try {
    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host = 'mail.maderaverdehotel.com.pe'; // Cambia esto al servidor SMTP que estás usando
    $mail->SMTPAuth = true;
    $mail->Username = 'adm@maderaverdehotel.com.pe'; // Cambia esto a tu dirección de correo
    $mail->Password = 'Adr567T+44'; // Cambia esto a tu contraseña de correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipientes
    $mail->setFrom($email, $name);
    $mail->addAddress('adm@maderaverdehotel.com.pe'); // Añadir destinatario principal
    $mail->addBCC('adm.lima@maderaverdehotel.com.pe'); // Añadir destinatario en copia oculta

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Hotel Madera Verde - Formulario Contacto';

    // Estructura del correo electrónico con CSS en línea
    $mail->Body    = utf8_decode("
    <html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333333;
            }
            .container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #dddddd;
                border-radius: 10px;
            }
            .header {
                background-color: #6c757d;
                color: white;
                padding: 10px;
                border-radius: 10px 10px 0 0;
                text-align: center;
            }
            .content {
                padding: 20px;
            }
            .content table {
                width: 100%;
                border-collapse: collapse;
            }
            .content table, .content th, .content td {
                border: 1px solid #dddddd;
            }
            .content th, .content td {
                padding: 10px;
                text-align: left;
            }
            .footer {
                margin-top: 20px;
                text-align: center;
                color: #777777;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Información de Contacto</h2>
            </div>
            <div class='content'>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <td>$name</td>
                    </tr>
                    <tr>
                        <th>Correo Electrónico</th>
                        <td>$email</td>
                    </tr>
                    <tr>
                        <th>Número de Teléfono</th>
                        <td>$telefono</td>
                    </tr>
                    <tr>
                        <th>Mensaje</th>
                        <td>$message_content</td>
                    </tr>
                </table>
            </div>
            <div class='footer'>
                <p><b>Madera Verde -  Formulario Contacto</b></p>
            </div>
        </div>
    </body>
    </html>
");

    $mail->send();
    echo '<script language="javascript">alert("El mensaje ha sido enviado correctamente."); window.location.href="http://maderaverdehotel.com.pe/";</script>';
} catch (Exception $e) {
    echo "Por favor verifica la información. Error: {$mail->ErrorInfo}";
}
