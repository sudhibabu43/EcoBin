<?php 
 include('../connection.php');
 session_start();
 if(!isset($_SESSION['is_adminlogin'])){
  if(isset($_REQUEST['aEmail'])){
   $aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
   $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));
   $sql = "SELECT email,password FROM login WHERE email = '".$aEmail."' AND password = '".$aPassword."'AND id=1 limit 1";
   $result = $conn->query($sql);
   if($result->num_rows == 1){
    $_SESSION['is_adminlogin'] = true;
    $_SESSION['aEmail'] = $aEmail;
    echo "<script> location.href='dashboard.php';</script>";
    exit;
   } else {
    $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>';
   }
  }
 } else {
  echo "<script> location.href='dashboard.php';</script>";
 }
?>

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
 <!-- custom css -->
 <link rel="stylesheet" href="../css/login.css">

 <style>
  .custom-margin {
   margin-top: 8vh;
  }
 </style>

 <title>Login</title>
</head>
<body>
<div class="mb-3 mt-5 text-center navbar-log" style="font-size: 30px;">
  <i class="fa-solid fa-dumpster-fire"></i>
  <span>Eco<span class="bin">Bin</span></span>
 </div>
 
 <div class="container-fluid">
  <div class="row justify-content-center custom-margin">
   <div class="col-sm-6 col-md-4">
    <form action="" class="shadow-lg box" method="POST">
        <p class="text-center box-text" style="font-size:30px;"><i class="fas fa-user-secret text-success"></i>Admin Login</p>    
        <div class="form-group">
      <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="aEmail">
      <small class="form-text">We'll never share your email with anyone else.</small>
     </div>
     <div class="form-group">
      <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label><input type="password" class="form-control" placeholder="Password" name="aPassword">
     </div>
     <button type="submit" class="btn-m btn-outline-sucess mt-3 font-weight-bold btn-block shadow-sm">Login</button>
     <?php if(isset($msg)) {echo $msg;} ?>
    </form>
   
   </div>
  </div>
 </div>


 <!-- JavaScript Files -->
 <script src="../js/jquery.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/all.min.js"></script>
</body>
</html>