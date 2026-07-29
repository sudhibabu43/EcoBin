<?php
define('PAGE', 'subrequest');
session_start();
include('head.php');
include "../connection.php";

if(isset($_SESSION['cpassword'])){
   $email = $_SESSION['cemail'];
} else {
   echo "<script> location.href='../intex/intex.php'</script>";
}

$sql="select * from register where Email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);


// define('PAGE','subrequest');
?>

<div class="col-sm-9 col-md-10 mt-5"> <!-- Start Service Request Form 2nd Column -->
 <form class="mx-5" action="" method="POST" enctype="">

  <!-- <div class="form-group">
   <label for="inputRequestInfo">Waste Type</label>
   <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo">
  </div> -->
  <div class="form-group ">
    <label  for="Email">Email</label>
   <input type="email" class="form-control " name="email" id="email" value="<?php echo $row['Email'] ?>" readonly>
   </div>

  <div class="form-group">
    <label for="gender" class="font-weight-bold pl-2">waste type</label> 
    <select class="form-control" name="type" id="type">
      <option value="regular">regular</option>
      <option value="urgent">urgent</option>
    </select>
  </div>

  <div class="form-group">
   <label for="inputRequestDescription">Description<small>(as your wish)</small></label>
   <textarea class="form-control"  placeholder="Write Description" name="description" autocomplete="off"rows="3" ></textarea>
  </div>

  <div class="form-group">
   <label for="inputName">Name</label>
   <input type="text" class="form-control" id="name" placeholder="name" value="<?php echo $row['FullName'] ?>" name="name">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputAddress">Address </label>
      <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" value="<?php echo $row['Address'] ?>"  name="address">
    </div>
    
    <div class="form-group col-md-4">
      <label for="inputZip">pincode</label>
      <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $row['pincode'] ?>" onkeypress="isInputNumber(event)">
    </div>
  </div>
  

  <div class="form-row">

   <div class="form-group col-md-4">
    <label for="inputMobile">Mobile</label>
    <input type="text" class="form-control" id="phone" pattern="[0-9]{10}" value="<?php echo $row['PhoneNo'] ?>" name="phone" onkeypress="isInputNumber(event)">
   </div>
   

    
   <div class="form-group col-md-4">
    <label for="inputDate">Time</label>
    <input type="time" class="form-control"  id="inputtime" name="requesttime" required>
   </div>

   <div class="form-group col-md-4">
    <label for="inputDate">Date</label>
    <input type="date" class="form-control" id="inputDate" name="requestdate" required>
   </div>

  </div>
  <button type="submit" class="btn-m " name="submit">Submit</button>
  <button type="reset" class="btn-m ml-3">Reset</button><h6 style="color:red;"><?php if(isset($errore)){ echo $errore; }?> </h6>
</form>

</div> 
<?php
include('waste_req_db.php');
?>
<?php

include('end.php');
?>
