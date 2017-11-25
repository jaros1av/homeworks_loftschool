<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "vendor/autoload.php";
class Mailer {
    protected $mail;
    public function __construct()
    {
        //Server settings
//    $mail->SMTPDebug = 2;
        $this->mail = new PHPMailer;                                // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'mytes7mail@yandex.ru';                 // SMTP username
        $this->mail->Password = 'Dev4oP3r20wQ';                           // SMTP password
        $this->mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $this->mail->setFrom('mytes7mail@yandex.ru', 'Mr. Burgers');
//        $this->mail->addAddress('mytes7mail@yandex.ru', 'Получатель');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
        $this->mail->addReplyTo('mytes7mail@yandex.ru', 'Information');
//    $mail->addCC('cc@example.com'); //копии для получателей
//    $mail->addBCC('bcc@example.com');

        //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $this->mail->CharSet = 'UTF-8';
        //Content
        $this->mail->isHTML(true);                                  // Set email format to HTML
    }
    public function setMessage($Subject, $message)
    {
        $this->mail->Subject = $Subject;
        $this->mail->Body    = $message;
        $this->mail->AltBody = $message;
    }
    public function sendMail($email = 'mytes7mail@yandex.ru')
    {
        $this->mail->addAddress($email, 'Получатель');
        $this->mail->send();
    }
}
