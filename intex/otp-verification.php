<?php session_start(); 

error_reporting(0);
include '../connection.php';
// Add your connection Code


// Important Files (Please check your file path according to your folder structure)
require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require "../PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Email From Form Input
$send_to_email = $_SESSION['email'];

// Generate Random 6-Digit OTP
$verification_otp = random_int(100000, 999999);

// Full Name of User
$send_to_name = $_SESSION['name'];

function sendMail($send_to, $otp, $name) {
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

    $mail->addAddress($send_to);

    // You can change the subject according to your requirement!
    $mail->Subject = "Account Activation";

    // You can change the Body Message according to your requirement!
    $mail->Body = "Hello, {$name}\nYour account registration is successfully done! Now activate your account with OTP {$otp}.";
    $mail->send();
}
$_SESSION['otp']=$verification_otp;
echo"<script> 
window.location.replace('verification.php');
</script>";
sendMail($send_to_email, $verification_otp, $send_to_name);
// Message to print email success!
echo "Email Sent Successfully!";



   ?>
