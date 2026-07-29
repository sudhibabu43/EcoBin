<?php
session_start();    
define('TITLE', 'add staff');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../connection.php');

 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 ?>
 <?php
 if(isset($_POST['submit'])){
  if(($_POST['name'] == "") || ($_POST['email'] == "") || ($_POST['pincode'] == "") || ($_POST['mobile'] == "")|| ($_POST['address'] == "")){
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $pincode = $_POST['pincode'];
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];
   $password = $_POST['password'];
   do {
   $id=random_int(1000, 9999);
   $sql="SELECT id from staff_login where id='$id'";
   $result1=$conn->query($sql);
   if ($result1->num_rows  == 0){
   $sql = "INSERT INTO staff_login (id,name, pincode,email,address,Password, phone) VALUES ('$id','$name','$pincode', '$email','$address','$password', '$mobile')";
    if($conn->query($sql) == TRUE){
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
    } else {
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
    }
  }
  }while($result1->num_rows > 0);
}
  }
 ?>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New Staff</h3>
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name">
    </div> 
    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password">
    </div> 
     <div class="form-group">
      <label for="Email">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="pincode">Pincode</label>
      <input type="number" class="form-control" id="pincode" name="pincode">
    </div>
    <div class="form-group">
      <label for="Mobile">Mobile</label>
      <input type="text" class="form-control" id="mobile" name="mobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="address" class="form-control" id="address" name="address">
    </div> 
  
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
      <a href="staff.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>
