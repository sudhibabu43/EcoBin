<?php
define('TITLE', 'Assets');
define('PAGE', 'assets');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['sEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">Register Details</p>
 <?php 
  $sql = "SELECT * FROM register where otp='active'"; 
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">ID</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">Email</th>';
      echo '<th scope="col">Aadress</th>';
      echo '<th scope="col">Pincode</th>';
      echo '<th scope="col">Phone No</th>';
      echo '<th scope="col">Aadhar No</th>';
      
      
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$row["id"].'</td>';
       echo '<td>'.$row["FullName"].'</td>';
       echo '<td>'.$row["Email"].'</td>';
       echo '<td>'.$row["Address"].'</td>';
       echo '<td>'.$row["pincode"].'</td>';
       echo '<td>'.$row["PhoneNo"].'</td>';
       echo '<td>'.$row["AadhaarNumber"].'</td>';
     
       
       echo '<td>';
        echo '<form action="editproduct.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$row["id"].'><button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
        echo '</form>';
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$row["id"].'><button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
       echo '</form>';
      
       echo '</td>';
      echo '</tr>';
     }
    echo '</tbody>';
   echo '</table>';
  } else {
   echo '0 Result';
  }
 ?>
</div>
<?php
 if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM register WHERE id = {$_REQUEST['id']}";
 if($conn->query($sql) == TRUE){
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
 } else {
  echo 'Unable to Delete';
 }
 }
?>
  <?php 


    if(isset($_POST['id']))
    {
        $id=$_POST['id'];
         $sql1="UPDATE register set otp='active' where id='$id'";
         $result=mysqli_query($conn,$sql1);
        $sql2="select email,password from register where id='$id'";
        $result1=mysqli_query($conn,$sql2);
        $row=mysqli_fetch_assoc($result1);
        $email=$row['email'];
        $password=$row['password'];
        


        $sql = "insert into login(id,email,password) value (0,'$email','$password')";
        $result=mysqli_query($conn,$sql);
      //   header('location :admin.php');
    }
?>

 <!-- JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
 </body>
</html>