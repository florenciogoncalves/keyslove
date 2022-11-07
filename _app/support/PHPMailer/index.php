<?php

/**
 * Testes não temrinados!
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . "/PHPMailer.php";
require __DIR__ . "/SMTP.php";
require __DIR__ . "/POP3.php";
require __DIR__ . "/Exception.php";

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '*';          //SMTP username
    $mail->Password   = '*';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('keyslove2022teste@gmail.com', 'Teste Keyslove');
    $mail->addAddress('keyslove2022teste@gmail.com', 'Keyslove');     //Add a recipient
    $mail->addReplyTo('keyslove2022teste@gmail.com', 'Information');

    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    $mail->setLanguage('pt', __DIR__ . "/language/phpmailer.lang-pt.php");

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
