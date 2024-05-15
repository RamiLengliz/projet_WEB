<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/SMTP.php';

require '../../../vendor/autoload.php';



    $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'careshare697@gmail.com';                 //SMTP username
    $mail->Password   = 'rjutzbysmcmxufzy';                    //SMTP password
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    //Recipients
    $mail->setFrom('careshare697@gmail.com');
    $mail->addAddress($_POST["email"]);     //Add a recipient

    $mail->addAttachment($_POST['courseImage'], 'courseImage.png');         // Add attachments, optionally rename

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "LETS STUDY";
    $mail->Body = 'Discover Our Course: ' . $_POST['courseName'];

    try {
    $mail->send();
    header("Location: listCours.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


