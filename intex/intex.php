<?php  
// error_reporting(0);
  include "register.php";
?>
<?php include "login.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

 <!-- Unicons -->
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/style.css">

 <title>ECOBIN</title>
</head>
<body>
<section id="home" class="home">
      
      
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
          <form action="" method="post" enctype="multipart/form-data">
            <h2>Login</h2><span style="color: red;"><?php echo $login_error; ?></span>

            <div class="input_box">
              <input type="email" name="email" placeholder="Enter your email" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input type="password" name="password" placeholder="Enter your password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              
              <a href="#" class="forgot_pw" id="forgot">Forgot password?</a>
                
            </div>


            <button class="button" name="login"  >Login Now</button>

            <div class="login_signup">Don't have an account? <a href="../registration/register.html" >Registration</a></div>
          </form>
         
        </div>

        <!-- Forgot From -->
        <div class="form forget-form">
          <form action="" method="post" enctype="multipart/form-data" >
            <h2>Forgot password</h2>

            <div class="input_box">
              <input type="email" name="email" placeholder="Enter your email" required />
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <!-- popup -->
            
            <button class="button" name="forgotemail" >Sent mail</button>


          
        
         
        <div class="login_signup">Account <a href="#" id="login">Login</a></div>
          </form>
        </div>
      </div>
    </section>
  
<!-- Start Navigation -->
<header>
  <nav class="navbar navbar-expand-sm  pl-30 fixed-top navbarc">
    <a href="index.php" class="navbar-brand">Eco<span class="bin">Bin</span></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
        <!-- <li class="nav-item"><a href="#home" class="nav-link" id="form-open">Login</a></li> -->
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
      </ul>
      
      <div class="h-right">
        <a href="#Follow">Follow Us</a>

        <a href="https://www.facebook.com/EcoBin" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
     <a href="https://twitter.com/EcoBin858" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
     <a href="https://www.youtube.com" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>

      </div>
    </div> 
  </nav> 
</header>
<!-- end of navigation -->
<!-- Start Header Jumbotron-->
<header class="jumbotron back-image" id="home"  >
  <div class="myclass">
   <h5 class="weltext">JOIN THE MOVEMENT TO SHAPE A CLEANER</h5>
   <h1 class="aim">Greener<br>Tomorrow</h1>
   <a href="#home" id="form-open" class="btn-l">Login</a>
   <a href="#registration" class="btn-s">Sign Up</a>
  </div>
</header> 
<!-- End Header Jumbotron-->

<!-- Start Introduction Section -->
<div class="container img" id="Services">
  <div class="image">
   <img src="../css/img/My project.png">
  </div>
  <div class="SUCHITWA">

   <h3 class="text-center text-uppercase text-h3">Our aim</h3>
   <h2 class="text-h2">A step to <br>improve<br> Sucithwa<br>Mission</h2>
   <p>
    Our website aims to promote sustainable waste managementby facilitating digitalized collection and disposal methods,supporting "SUCHITWA MISSION" and contributing to a cleaner environment in kerala
   </p>
  </div>
</div> 
<!-- End Introduction Section  -->

<!-- Start Registration Form -->
<!-- <?php //include('UserRegistration.php') ?> (REPLACE THE BELOW FORM WITH THIS CODE WHEN THE USERREGISTRATION.PHP IS READY) -->
 
<div class="reg container " id="registration" >
  <h2 class="text-center acc">Create an Account</h2>
  <div class="row mt-4 mb-4">
   <div class="col-md-6 offset-md-3">
    <form  action="" class="shadow-lg p-4" method="POST" enctype="multipart/form-data">
     <div class="form-group">
      <i class="fas fa-user icon"></i> <label for="name" class="font-weight-bold pl-2">Full Name</label><input type="text" class="form-control" placeholder="Name" name="fullName"required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
     </div>

     <div class="form-group">
          <i class="fas fa-user icon"></i>
          <label for="email" class="font-weight-bold pl-2">Email</label><span><?php echo "<nav style='color:red;'>$errore</nav>"; ?></span>
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <small class="form-text warn">We'll never share your email with anyone else.</small>
     </div>



     <div class="form-group">
          <i class="fas fa-key icon"></i> 
          <label for="pass" class="font-weight-bold ">Password</label>
          <br>
          <input type="password" class="form-" placeholder="Password" name="password"required>
     </div>



     <div class="form-group">
     <i class="fas fa-phone icon"></i>
     <label for="gender" class="font-weight-bold pl-2">gender</label> 
      <select class="form-control" name="gender" id="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="others">Others</option>
      </select>
     </div>

     <div class="form-group">
     <i class="fas fa-phone icon"></i> <label for="phon" class="font-weight-bold pl-2">Phone number</label><input type="number" class="form-control" placeholder="Phone number" pattern="[0-9]{10}" name="phoneNumber" required>
     </div>

     <div class="form-group">
      <i class="fas fa-home icon"></i> <label for="address" class="font-weight-bold pl-2">Address</label><input type="text" class="form-control" placeholder="address line 1" name="aadress"required>
     </div>

     <div class="form-group">
     <i class="fas fa-phone icon"></i> <label for="phon" class="font-weight-bold pl-2">Aadhar number</label><input type="number" class="form-control" placeholder="Aadhar number" pattern="[0-9]{12}" name="aadhaar-no" required><span><?php echo "<nav style='color:red;'>$errora</nav>"; ?></span>
     </div>
    
     <div class="form-group">
        <i class="fas fa-home icon"></i> <label for="pincode" class="font-weight-bold pl-2">pincode</label><br><input type="numbe" class="form-" placeholder="PINCODE" pattern="[0-9]{6}" id="pincode" name="pincode" required>
        <a type="button" class="btn-m" onclick="get_details()" >CHECK</a>
    </div>

    <div class="form-group">
      <i class="fas fa-home icon"></i> <label for="city" class="font-weight-bold pl-2">city</label><br><input type="text" class="form-" placeholder="city" id="city" name="city" readonly>
    </div>
     
    <div class="form-group">
      <i class="fas fa-home icon"></i> <label for="Local area" class="font-weight-bold pl-2">Local Area</label><br><input type="text" class="form-" id="localarea" placeholder="Localarea" name="localarea" required >
    </div>

    <div class="form-group">
      <i class="fas fa-home icon"></i> <label for="proof" class="font-weight-bold pl-2">Aadhar proof (pdf)</label><br><input type="file" class="form-" name="aadhaarproof" accept=".pdf">
    </div>

    <!-- <div class="form-group">
        <label for="resume">Aadhar proof (PDF)</label>
        <input type="file" id="resume" name="resume" accept=".pdf" required>
      </div> -->

     <button type="submit" class="btn mt-5 btn-block shadow-sm font-weight-bold btn-m" name="register">Sign Up</button>
     <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy</em>
    <?php if(isset($regmsg)) {echo $regmsg;} ?>   <!-- PLEASE CHECK IF THIS IS CORRECT -->
    </form>
   </div>
  </div>
</div>
<!-- End Registration Form  -->

<!-- Start Contact US -->
  <div class=" reg container" id="Contact">
    
    <di class="row">
    <div class="col-md-8">
     <!-- Start 1st Column -->
      <!-- <?php //include('contactform.php') ?>  (ADD THIS WHEN YOU CREATE CONTACTFORM.PHP) -->
      <h2 class="contactus  text-center mb-4">Contact Us</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" class="form-control" name="name" placeholder="Name"><br>
        <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
        <input type="email" class="form-control" name="email" placeholder="Email"><br>
        <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
        <input type="submit" class="btn btn-primary btn m"  name="contact-submit"><br><br>
      </form>
    </div>
    <!-- End 1st Column -->
    <div class="contact text-center"> <!-- Start 2nd Column -->
      <strong>Headquarter:</strong><br>
      EcoBin pvt Ltd,<br>
      Subash Nagar, delhi<br>
      New Delhi - 110064<br>
      Phone: +91 9871****22<br>
      <a href="#" target="_blank">www.EcoBin.com</a><br>
      <br> <br>
      <strong>Branch:</strong><br>
      EcoBin pvt Ltd,<br>
      karunagappalli, kollam<br>
      kerala - 690542<br>
      Phone: +91 9544****53<br>
      <a href="#" target="_blank">www.EcoBin.com</a><br>    
     </div> <!-- End 2nd Column -->
    </div>
   </div>
     
  
<!-- End Contact US -->
<!-- Start Footer -->
<footer class="reg container-fluid bg-dark text-white">
  <div class="container">
   <div class="row py-3">
    <div class="col-md-6"> <!-- Start 1st Column -->
     <span class="pr-2" id="Follow">Follow Us: </span>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
     <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
    </div> <!-- End 1st Column -->
    <div class="col-md-6 text-right"> <!-- Start 2nd Column -->
     <small>Minor Project(Group 5)<br>Bsc Computer Science<br>Batch 2021-2024<br> &copy; 2023</small>
     <small class="ml-2"><a href="../staff/login.php">Staff Login</a></small>
    </div> <!-- End 2nd Column -->
   </div>
  </div>
 </footer>  
 

<!-- javascript starts here -->



    <!-- checking PINCODE -->

    <script  >

function get_details() {
    var pincode = jQuery('#pincode').val();
    if (pincode == '') {
        jQuery('#city').val('');
        jQuery('#localarea').val('');
    } else {
        jQuery.ajax({
            url: 'get.php',
            type: "post",
            data: 'pincode=' + pincode,
            success: function (data) {
                if (data == 'no') {
                    alert('Wrong Pincode');
                    jQuery('#city').val('');
                    jQuery('#localarea').val('');
                } else {
                    try {
                        var getData = $.parseJSON(data);
                        jQuery('#city').val(getData.city);   // Populate city input field
                        jQuery('#localarea').val(getData.localarea); // Populate state input field
                    } catch (e) {
                        console.error("Error parsing JSON: " + e);
                    }
                }
                console.log(data);
            }
        });
    }
}


    </script>  
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
  <script src="../js/script.js"></script>
  <script src="../js/popup-login.js"></script>
</body>  
</html>
<?php 
            if(isset($_POST['forgotemail'])){
           include "forgot-password.php"; } ?>
           <?php 
            if(isset($_POST['register'])){
           include "register.php"; } ?>
            <?php 
            if(isset($_POST['contact-submit'])){
           include "contact-us.php"; } ?>