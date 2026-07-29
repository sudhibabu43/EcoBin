<?php
define('TITLE', 'Assets');
define('PAGE', 'assets');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_stafflogin'])){
   $aEmail = $_SESSION['semail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">Request Details</p>
 <?php 
  $sql = "SELECT * FROM waste_request where confirm='0'and type='urgent'"; 
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
      echo '<th scope="col">Time</th>';
      
      echo '<th scope="col">Date</th>';
      
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      $formattedTime=$row['time'];
      $time  = date('h:i a', strtotime($formattedTime));
      echo '<tr>';
       echo '<td>'.$row["id"].'</td>';
       echo '<td>'.$row["name"].'</td>';
       echo '<td>'.$row["email"].'</td>';
       echo '<td>'.$row["address"].'</td>';
       echo '<td>'.$row["pincode"].'</td>';
       echo '<td>'.$row["phone"].'</td>';
       echo '<td>'.$time.'</td>';
       echo '<td>'.$row["date"].'</td>';
      
       
       
       echo '<td>';
       
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$row["id"].'><button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
       echo '</form>';
       echo '<form action="" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$row["id"].'><button type="submit" class="btn btn-warning mr-3" name="confirm" value="Confirm"><i class="fas fa-handshake"></i></button>';
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
  $id=$_REQUEST['id'];
  $subject="Waste collection request";
  $body="Your waste collection request cancelled \n Request Id : $id";
  
  $sql="select email from waste_request where id=$id";
  $rslt=mysqli_query($conn,$sql);
  $rw = $rslt->fetch_assoc();
  $email=$rw['email'];
  include_once "email_reject.php";
 $sql = "DELETE FROM waste_request WHERE id = {$id}";
 if($conn->query($sql) == TRUE){
  
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';

  
 } else {
  echo 'Unable to Delete';
 }
 }
?>
  <?php 
    

    if(isset($_REQUEST['confirm']))
    {
      
        $id=$_REQUEST['id'];
       
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
            
            // Compose the email subject and body
            $subject = "Waste collecting info";
            $body = "Dear {$cname}\nYour Waste collection request is confirmed at: {$cdate}   {$ctime}.";

           include_once "email_reject.php";

          //      // Insert data into waste_request_confirm database
          //      $sql="INSERT INTO waste_request_confirm(id,name,address,date,time)
          //      SELECT id,name,address,date,time FROM waste_request";
          //  $result2 = mysqli_query($conn, $sql);
          //   // sendMail($cemail,$body,$subject);
           
              
          //     echo $email;
               echo '<meta http-equiv="refresh" content= "0;URL=?Confirm" />'; 
               
                
               
                 
    }         
            
        //  if($conn->query($sql) == TRUE){
         
        //   $sql1="select * from waste_request where id='$id ";
        //   $rslt=mysqli_query($conn,$sql);
        //   $row1=$rslt->fetch_assoc();
        //   $cid=$row1['id'];
        //   $cname=$row1['name'];
        //   $caddress=$row1['address'];
        //   $cdate=$row1['date'];
        //   $ctime=$row['time'];
          

        //   //mail sent

        //   $subject="Waste collecting info";
        //   $body="Dear {$cname}\n Your Waste collection request is conformed at : {$cdate}  {$ctime}.";
        //   include_once 'email_reject.php';
        //   //insert datas into waste request confirm database

        //   $sql="insert into waste_request_confirm (id,name,address,date,time) values ('$cid','$cname','$caddress','$cdate','$ctime')";
        //   $result=mysqli_query($conn,$sql);

        //   echo '<meta http-equiv="refresh" content= "0;" />';
        //  } else {
        //   echo 'Unable to Confirm';
        //  }
      
        


        // $sql = "insert into login(id,email,password) value (0,'$email','$password')";
        // $result=mysqli_query($conn,$sql);
      //   header('location :admin.php');
    // }
?>

 <!-- JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
 </body>
</html>