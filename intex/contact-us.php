<html>
    <head><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head>
</html>

<?php

// To Remove unwanted errors
error_reporting(0);

// Add your connection Code
include "../connection.php";

// Important Files (Please check your file path according to your folder structure)
require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require "../PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
$email_receive = $_POST["email"];

$name_receive = $_POST["name"];

$subject_receive = $_POST["subject"];


$message_receive = $_POST["message"];


// Full Name of User


    
function sendMail($name,$email,$subject,$message) {
    
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
    $mail->setFrom("ecobin858@gmail.com", "$name");

    $mail->addAddress("ecobin858@gmail.com");

    // You can change the subject according to your requirement!
    $mail->Subject = $subject;

    // You can change the Body Message according to your requirement!
    $mail->Body = "{$email}
    subject : {$subject }
    message : {$message}";
    $mail->send();
}
sendMail($name_receive,$email_receive,$subject_receive,$message_receive );
?>
<script>
    
    swal("Thank you", "", "");

   
</script>

