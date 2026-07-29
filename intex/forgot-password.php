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
$send_to_email = $_POST["email"];

$gmail = "SELECT password FROM login WHERE email='$send_to_email'";
$result = $conn->query($gmail);
$row=$result->fetch_assoc();
$password=$row['password'];


// Generate Random 6-Digit OTP
// $verification_otp = random_int(100000, 999999);

// Full Name of User
// $send_to_name = $_POST["fullName"];
  if($password){
    
function sendMail($send_to,$pass) {
    
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
    $mail->Subject = "Forgot password";

    // You can change the Body Message according to your requirement!
    $mail->Body = "We received a request to reset your Ecobin account password. We understand how important security is, so let's get you back on track!

Your password is: {$pass}

Please ensure you keep this password safe and avoid sharing it with others. If you didn't request this change, please contact our support team immediately.

Click the link below to log in to your account securely and explore the Eco Bin platform:

Login Link: http://localhost/ecobin/login-page/index.php

If you encounter any issues or need further assistance, don't hesitate to reach out to our support team at support@ecobin.com.

Thank you for being part of the Ecobin community.

Best regards,
The Ecobin Team";
    $mail->send();
}

sendMail($send_to_email,$password);
// // Message to print email success!

?>
<script>
    
    swal("Email Sended", "Check Your Email", "success");

    // setTimeout(function() {
    //     document.location.href = 'index.php';
    // }, 5000);
    
</script>
<?php

 }
 else
 {
 ?>
 <script>
    swal("No account found with that email aadress ⚠", "...Try another!");</script>
    <!-- echo "<script>alert('This email id not found');
    // document.location.href='index.php';</script>"; -->
<?php }

?>