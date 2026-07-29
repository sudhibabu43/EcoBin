<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../connection.php');
session_start();
 if(isset($_SESSION['is_stafflogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 if(isset($_REQUEST['submit'])){
  if(($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['pincode'] == "") || ($_REQUEST['mobile'] == "")|| ($_REQUEST['address'] == "")){
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $name = $_REQUEST['name'];
   $email = $_REQUEST['email'];
   $pincode = $_REQUEST['pincode'];
   $mobile = $_REQUEST['mobile'];
   $address = $_REQUEST['address'];

   do {
   $id=random_int(1000, 9999);
   $sql="SELECT id from staff_login where id='$id'";
   $result1=$conn->query($sql);
   if ($result1->num_rows > 0){
   $sql = "INSERT INTO staff_login (id,name,email, pincode, phone,address) VALUES (null,'$name', '$email','$pincode', '$phone','$address')";
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
      <input type="text" class="form-control" id="address" name="address">
    </div> 
  
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="submit" name="submit">Submit</button>
      <a href="technician.php" class="btn btn-secondary">Close</a>
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
