<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once "../../INCLUDES/PHPMAILER/Exception.php";
require_once "../../INCLUDES/PHPMAILER/PHPMailer.php";
require_once "../../INCLUDES/PHPMAILER/SMTP.php";

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->Host = "localhost";
    $mail->Port = 1025;

    $mail->CharSet = "utf-8";

    $mail->addAddress("ljfermeture@gmail.com");

    $mail->setFrom("lhuilejohan85@gmail.com");

    $mail->Subject = "Lien de Verification ";

    $mail->Body = "Bonjour, Veuillez Cliquer sur le liens si dessous pour vadider votre compte";

    $mail->send();

    echo "Message envoyé";

}
catch(Exception){

    echo "Message non envoyé. Erreur: {$mail->ErrorInfo}";
}