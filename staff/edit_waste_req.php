<?php
define('TITLE', 'Ecobin');
define('PAGE', 'waste_requestr');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_stafflogin'])){
   $aEmail = $_SESSION['semail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['pupdate'])){
  if(($_REQUEST['date'] == "") || ($_REQUEST['time'] == "") || ($_REQUEST['id'] == "")  ){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {
    
    $id = $_REQUEST['id'];
    $date = $_REQUEST['date'];
    $formattedTime=$_REQUEST['time'];
    $time  = date('h:i a', strtotime($formattedTime));
    
    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject="Waste collection request";
    $body="Hello, {$name}\nYour waste collecting date and time have been updated to: {$date} {$time} ";
    // $psellingcost = $_REQUEST['psellingcost'];
    $sql = "UPDATE waste_request SET date = '$date', time = '$time',confirm='update' WHERE id = '$id'";
   
     if($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
      include_once "email_reject.php";
     } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
     }
   }
}
?>

<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update time and date</h3>
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM waste_request WHERE id = {$_REQUEST['id']}";
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
       <label for="pname"> Name</label>
      <input type="text" class="form-control" id="pname" name="name" value="<?php if(isset($row['name'])) {echo $row['name']; }?>" readonly>
    </div>
  
    <div class="form-group">
      <label for="pava">Email</label>
      <input type="text" class="form-control" id="pava" name="email"  value="<?php if(isset($row['email'])) {echo $row['email']; }?>" readonly>
    </div>
    
    <div class="form-group">
      <label for="poriginalcost">Time</label>
      <input type="time" class="form-control" id="inputtime" name="time"  value="<?php if(isset($row['time'])) {echo $row['time']; }?>">
    </div>
    <div class="form-group">
      <label for="psellingcost">Date</label>
      <input type="date" class="form-control" id="inputdate" name="date" value="<?php if(isset($row['date'])) {echo $row['date']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="pupdate" name="pupdate">Update</button>
      <a href="waste_requestr.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->


<?php
include('includes/footer.php'); 
?>