<?php
namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '/var/www/html/config.php';

class Mailer
{
    static function sendMail(String $to, $subject, $message, $from = ""):void
    {
        $mail = self::getMailer();

        // Set email format to HTML
        $mail->isHTML(true);

        // Set email subject
        $mail->Subject = $subject;

        // Set email body
        $mail->Body = $message;

        // Add recipient
        $mail->addAddress($to);

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
        } else {
            // echo 'Message has been sent';
        }

        $mail->smtpClose();
    }

    private static function getMailer(): PHPMailer
    {
        $mail = new PHPMailer(true);

        // Set mailer to use smtp
        $mail->isSMTP();

        // define smtp host
        $mail->Host = "smtp-mail.outlook.com";

        // enable smtp authentification
        $mail->SMTPAuth = "true";

        // set type of encryption (ssl/tls)
        $mail->SMTPSecure = "tls";

        // set port to connect smtp
        $mail->Port = "587";

        // set gmail username
        //$mail->Username = "OfficialCritichub@outlook.fr";
        $mail->Username = MAILER_MAIL;

        // set gmail password
        //$mail->Password = "Paya2023";
        $mail->Password = MAILER_PASSWORD;

        $mail->SMTPDebug = 0;

        $mail->setFrom(MAILER_MAIL);

        return $mail;
    }
}