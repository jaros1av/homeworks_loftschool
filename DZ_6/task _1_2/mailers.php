<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "vendor/autoload.php";
$mail = new PHPMailer;
    //Server settings
//    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mytes7mail@yandex.ru';                 // SMTP username
    $mail->Password = 'Dev4oP3r20wQ';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mytes7mail@yandex.ru', 'Отправлено через Mailer');
    $mail->addAddress('bandor@yandex.ru', 'Получатель');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('mytes7mail@yandex.ru', 'Information');
//    $mail->addCC('cc@example.com'); //копии для получателей
//    $mail->addBCC('bcc@example.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->CharSet = 'UTF-8';
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Success';
}