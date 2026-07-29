<?php
// To Remove unwanted errors
error_reporting(0);

// Add your connection Code


// Important Files (Please check your file path according to your folder structure)
require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require "../PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



function sendMail($email, $body,$subject) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Enter your email ID
    $mail->Username = "ecobin858@gmail.com";
    $mail->Password = "sldzsigysvhcfqsc";

    // Your email ID and Email Title
    $mail->setFrom("ecobin858@gmail.com", "Eco Bin");

    $mail->addAddress($email);

    // You can change the subject according to your requirement!
    $mail->Subject = $subject;

    // You can change the Body Message according to your requirement!
    $mail->Body = $body;
   
    $mail->send();
}


// Message to print email success!
?>