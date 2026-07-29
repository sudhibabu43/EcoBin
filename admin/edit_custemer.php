<?php
define('TITLE', 'Update Product');
define('PAGE', 'assets');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['pupdate'])){
  if(($_REQUEST['FullName'] == "") || ($_REQUEST['Email'] == "") || ($_REQUEST['AadhaarNumber'] == "") || ($_REQUEST['pincode'] == "") || ($_REQUEST['Address'] == "") || ($_REQUEST['Address'] == "") ){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['FullName'];
    $email = $_REQUEST['Email'];
    $aadhaarnumber = $_REQUEST['AadhaarNumber'];
    $pincode = $_REQUEST['pincode'];
    $address = $_REQUEST['Address'];
    // $psellingcost = $_REQUEST['psellingcost'];
    $sql = "UPDATE register SET FullName = '$name', Email = '$email', AadhaarNumber = '$aadhaarnumber', pincode= '$pincode', Address = '$address' WHERE id = '$id'";
     if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
     } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
     }
   }
}
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update Custemer Details</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM register WHERE id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pid">ID</label>
      <input type="text" class="form-control" id="pid" name="id" value="<?php if(isset($row['id'])) {echo $row['id']; }?>" readonly>
    </div>
    <div class="form-group">
       <label for="pname">Name</label>
      <input type="text" class="form-control" id="pname" name="FullName" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')" value="<?php if(isset($row['FullName'])) {echo $row['FullName']; }?>">
    </div>
    <!-- <div class="form-group">
      <label for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="pdop" value="<?php if(isset($row['pdop'])) {echo $row['pdop']; }?>">
    </div> -->
    <div class="form-group">
      <label for="pava">Email</label>
      <input type="text" class="form-control" id="pava" name="Email"  value="<?php if(isset($row['Email'])) {echo $row['Email']; }?>">
    </div>
    <div class="form-group">
      <label for="ptotal">Aadhaar No</label>
      <input type="number" class="form-control" id="ptotal" name="AadhaarNumber" required pattern="[0-9]{12}"  value="<?php if(isset($row['AadhaarNumber'])) {echo $row['AadhaarNumber']; }?>">
    </div>
    <div class="form-group">
      <label for="poriginalcost">Address</label>
      <input type="text" class="form-control" id="poriginalcost" name="Address"  value="<?php if(isset($row['Address'])) {echo $row['Address']; }?>">
    </div>
    <div class="form-group">
      <label for="psellingcost">Pincode</label>
      <input type="text" class="form-control" id="psellingcost" name="pincode" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pincode'])) {echo $row['pincode']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Update</button>
      <a href="register_details.php" class="btn btn-secondary">Close</a>
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