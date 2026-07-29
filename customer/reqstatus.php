<?php
define('PAGE','reqstatus');
session_start();
include('head.php');
include('../connection.php');
?>
<!-- Start 2nd Column  -->
<div class="col-sm-6 mt-5 mx-3">
  <?php 
  $requestEmail = $_SESSION['cemail']; // You had hardcoded the request ID, consider getting this dynamically
  $sql1 = "SELECT confirm FROM waste_request WHERE email = '$requestEmail'";
  $result1 = $conn->query($sql1);
  $row1 = $result1->fetch_assoc();
  $n=-1;
  if($result1 == TRUE && isset($row1['confirm'])){
  $n=$row1['confirm'];
  
  $sql = "SELECT * FROM waste_request WHERE email = '$requestEmail'and confirm='$n'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  }

  if($n==1||$n=='update') { // Checking if data is available
  ?>

  <h3 class="text-center mt-5">Waste collecting status</h3>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td>Request ID</td>
        <td><?php echo $row['id']; ?></td>
      </tr>
      <tr>
        <td>Date</td>
        <td><?php echo $row['date']; ?></td>
      </tr>
      <tr>
        <td>Time</td>
        <td><?php echo date('h:i a', strtotime($row['time'])); ?></td>
      </tr>
      <tr>
        <td>Address Line 1</td>
        <td><?php echo $row['address']; ?></td>
      </tr>
      <tr>
        <td>Type</td>
        <td><?php echo $row['type']; ?></td>
      </tr>
      <tr>
        <td>Cost</td>
        <td>
          <?php 
          if ($row['type'] == 'urgent') {
            echo "50/- rupees";
          } elseif ($row['type'] == 'regular') {
            echo "0/- rupees";
          }
          ?>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="text-center">
    <form action="" method="post" class="mb-3 d-print-none">
      <?php if($n=='update'){?>
        <input class="btn btn-danger" type="submit" name="confirm" value="Confirm Request" >
        <?php }else {?>
      <input class="btn btn-danger" type="button" value="Print" onClick="window.print()">
      <?php } ?>
      <input class="btn btn-secondary" type="submit" name="cancelled" value="Cancell Request" >
       <!-- Add a hidden input field to hold the request ID -->
       <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    </form>
        
  </div>
  <?php } else if($n==0){ ?>
  <div class="alert alert-info mt-4">Your Request is Still Pending</div>
  <?php } 
  else { ?>
   <div class="alert alert-info mt-4">Empty request</div>
   <?php } ?>
</div> <!-- End 2nd Column  -->
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
 if(isset($_POST['cancelled'])){
  $id=$_POST['id'];
  echo $id;
  
//   $subject="Waste collection request";
//   $body="Your waste collection request cancelled \n Request Id : $id";
  
//   $sql="select email from waste_request where id=$id";
//   $rslt=mysqli_query($conn,$sql);
//   $rw = $rslt->fetch_assoc();
//   $email=$rw['email'];
//   include_once "email_reject.php";
 $sql = "DELETE FROM waste_request WHERE id = {$id}";
 $sql1 = "DELETE FROM waste_request_confirm WHERE id = {$id}";
 if($conn->query($sql) == TRUE){
  if($conn->query($sql1) == TRUE){
  
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';

  }
 } else {
  echo 'Unable to Delete';
 }
 }
?>
?>
  <?php 
    // include_once 'email_confirm.php';

    if(isset($_POST['confirm']))
    {
      
        $id=$_POST['id'];
       
         $sql="UPDATE waste_request set confirm='1' where id='$id'";
         $result=mysqli_query($conn,$sql);

       
          // Fetch details from the waste_request table
          $sql1 = "SELECT * FROM waste_request WHERE id='$id'";
          $rslt = mysqli_query($conn, $sql1);
      
            $row1 = $rslt->fetch_assoc();
            $cid = $row1['id'];
            $cname = $row1['name'];
            $caddress = $row1['address'];
            $cdate = $row1['date'];

            $formattedTime=$row1['time'];
            $ctime  = date('h:i a', strtotime($formattedTime));
            $email=$row1['email'];
            echo $email;
            // Compose the email subject and body
            $subject = "Waste collecting info";
            $body = "Dear {$cname}\nYour Waste collection request is confirmed at: {$cdate}   {$ctime}.";

           include_once "email_confirm.php";
    }
?>
<?php
include('end.php');
?>
