
<?php
 session_start(); 
    include("../connection.php");
    error_reporting(0);
   if (isset($_POST['login'])) {
        $Email = $_POST['email'];
        $Password = $_POST['password'];
      
     
        // Query to check if the provided credentials are valid
        $sql = "SELECT * FROM login WHERE email='$Email' AND password='$Password'";
      
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
          $_SESSION['cpassword'] =$Password;
          $_SESSION['cemail'] = $Email;
         
          echo "Login successful!";
          header('location: ../customer/editprofile.php');
          exit();
        } else {
          
         $login_error="Wrong email/password combination";
         
             
         
        }
      }
$conn->close();
?>