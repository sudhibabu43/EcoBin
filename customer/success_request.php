<?php
define('TITLE', 'Success');
define('PAGE', 'SubmitRequest');

session_start();
include('head.php');
include('../connection.php');

if($_SESSION['cpassword']){
 $email=$_SESSION['cemail'];
} else {
 echo "<script> location.href='../intex/intex.php'</script>";
}

$sql = "SELECT * FROM waste_request WHERE email ='$email'";
$result = $conn->query($sql);
if($result->num_rows > 0){
 $row = $result->fetch_assoc();
 $formattedTime=$row['time'];
 $time  = date('h:i a', strtotime($formattedTime));
 echo "<div class='ml-5 mt-5'>
 <table class='table'style='color:white;'>
  <tbody>
   <tr>
     <th>Request ID</th>
     <td>".$row['id']."</td>
   </tr>
   <tr>
     <th>Name</th>
     <td>".$row['name']."</td>
   </tr>
   <tr>
   <th>Email ID</th>
   <td>".$row['email']."</td>
  </tr>
   <tr>
    <th>Time</th>
    <td>".$time."</td>
   </tr>
   <tr>
    <th>Date</th>
    <td>".$row['date']."</td>
   </tr>

   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
  </tr>
  </tbody>
 </table> </div>
 ";
} else {
 echo "Failed";
}
include('end.php');
?>