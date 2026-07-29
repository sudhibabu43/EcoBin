<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
$sql = "SELECT count(id) FROM register where otp='inactive'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$request = $row[0];

// $sql = "SELECT max(rno) FROM assignwork_tb";
// $result = $conn->query($sql);
// $row = $result->fetch_row();
// $assignwork = $row[0];

$sql = "SELECT count(id) FROM staff_login";
$result = $conn->query($sql);
$row = $result->fetch_row();
$no_of_staff = $row[0];

?>
   <div class="col-sm-9 col-md-10"> <!-- Start Dashboard 2nd Column -->
    <div class="row text-center mx-5">
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
       <div class="card-header">Requests Received</div>
       <div class="card-body">
        <h4 class="card-title"><?php echo $request; ?></h4>
        <a class="btn text-white" href="register_details.php">View</a>
       </div>
      </div>
     </div>
     
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width:18rem;">
       <div class="card-header">No. of Staff</div>
       <div class="card-body">
        <h4 class="card-title"><?php echo $no_of_staff; ?></h4>
        <a class="btn text-white" href="staff.php">View</a>
       </div>
      </div>
     </div>
    </div>
    <div class="mx-5 mt-5 text-center">
     <p class="bg-dark text-white p-2">List of Requesters</p>
     <?php 
      $sql = "SELECT * FROM register where otp='inactive'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '
       <table class="table">
        <thead>
         <tr>
          <th scope="col">Requester ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
         </tr>
        </thead>
        <tbody>';
         while($row = $result->fetch_assoc()){
         echo '<tr>';
          echo '<td>'.$row["id"].'</td>';
          echo '<td>'.$row["FullName"].'</td>';
          echo '<td>'.$row["Email"].'</td>';
         echo '</tr>';
         }
        echo '</tbody>
       </table>';
      } else {
       echo '0 Result';
      }
     ?>
    </div>
   </div> <!-- End Dashboard 2nd Column -->
<?php include('includes/footer.php')?>