<?php session_start(); ?>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!-- <!doctype html>
<html lang="en">
<head> -->
    <!-- Required meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->

    <!-- <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png"> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->

    <!-- <title>Verification</title> -->
<!-- </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Verification Account</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verification Account</div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Verify" name="verify">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html> -->
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>OTP Verification Form</title>
    <link rel="stylesheet" href="../css/otp.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
   <script src="../js/otp.js" defer></script>
  </head>
  <body>
    <div class="container">
      <header>
        <i class="bx bxs-check-shield"></i>
      </header>
      <h4>Enter OTP Code</h4>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-field">
          <input type="number" name="input1" />
          <input type="number" name="input2" disabled />
          <input type="number" name="input3" disabled />
          <input type="number" name="input4" disabled />
          <input type="number" name="input5" disabled />
          <input type="number" name="input6" disabled />
        </div>
        <button name='verify'>Verify OTP</button> 
      </form>
    </div>
  </body>
</html>

<?php 
    include('../connection.php');
    if(isset($_POST["verify"])){

        $input1 = $_POST["input1"];
        $input2 = $_POST["input2"];
        $input3 = $_POST["input3"];
        $input4 = $_POST["input4"];
        $input5 = $_POST["input5"];
        $input6 = $_POST["input6"];
        
      

    $combinedNumber = intval($input1 . $input2 . $input3 . $input4 . $input5 . $input6);
    
        $otp = $_SESSION['otp'];
        $email = $_SESSION['email'];
        

        if($otp !=  $combinedNumber){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($conn, "UPDATE register SET otp = 'inactive' WHERE email = '$email'");
            ?>
             <script>
                 alert("After verfiy your registration ");
                   window.location.replace("intex.php");
             </script>
             <?php
        }

    }

?>