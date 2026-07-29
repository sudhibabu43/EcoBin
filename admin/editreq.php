<?php    
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../connection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 ?>
 <!-- Start 2nd COlumn -->
 <div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update Requester Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM staff_login WHERE id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['id'] == "") || ($_REQUEST['name'] == "") || ($_REQUEST['email'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fileds</div>';
    } else {
     $id = $_REQUEST['id'];
     $name = $_REQUEST['name'];
     $email = $_REQUEST['email'];
     $pincode =$_REQUEST['pincode'];
     $phone =$_REQUEST['phone'];
     $address =$_REQUEST['address'];
    
     $sql = "UPDATE staff_login SET id = '$id', name = '$name', email = '$email' pincode ='$pincode', phone='$phone',address='$address' WHERE id = '$id'";
     if($conn->query($sql) ==  TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
     } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
     }
    }
   }
  ?>
  <form action="" method="POST">
   <div class="form-group">
    <label for="r_login_id">Requester ID</label>
    <input type="text" class="form-control" name="id" id="id" Value="<?php if(isset($row['id'])) { echo $row['id']; } ?>" readonly>
   </div>
   <div class="form-group">
    <label for="r_name">Name</label>
    <input type="text" class="form-control" name="name" id="name" Value="<?php if(isset($row['name'])) { echo $row['name']; } ?>">
   </div>
   <div class="form-group">
      <label for="pincode">Pincode</label>
      <input type="number" class="form-control" id="pincode" name="pincode"  Value="<?php if(isset($row['pincode'])) { echo $row['pincode']; } ?>">
    </div>
    <div class="form-group">
      <label for="Mobile">Mobile</label>
      <input type="text" class="form-control" id="mobile" name="mobile" onkeypress="isInputNumber(event)"  Value="<?php if(isset($row['mobile'])) { echo $row['mobile']; } ?>">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address" Value="<?php if(isset($row['address'])) { echo $row['address']; } ?>" >
    </div> 
   <div class="form-group">
    <label for="r_email">Email</label>
    <input type="text" class="form-control" name="email" id="email" Value="<?php if(isset($row['email'])) { echo $row['email']; } ?>">
   </div>
   <div class="text-center">
    <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
    <a href="requester.php" class="btn btn-secondary">Close</a>
   </div>
   <?php if(isset($msg)) {echo $msg; } ?>
  </form>
 </div> <!-- End 2nd COlumn -->

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