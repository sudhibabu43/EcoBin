<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_stafflogin'])){
   $sEmail = $_SESSION['semail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
// $sql = "SELECT * FROM staff_login where email='$sEmail'";
// $result = $conn->query($sql);
// $row1 = $result->fetch_row();
// $pincode=$row1["pincode"];
$sql = "SELECT count(id) FROM waste_request where type='urgent'and confirm='0'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$urgentrequest = $row[0];


$sql = "SELECT count(id) FROM waste_request where type='regular'and confirm='0'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$regularrequest = $row[0];

?>
   <div class="col-sm-9 col-md-10"> <!-- Start Dashboard 2nd Column -->
    <div class="row text-center mx-5">
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
       <div class="card-header">Urgent Waste Requests</div>
       <div class="card-body">
        <h4 class="card-title"><?php echo $urgentrequest; ?></h4>
        <a class="btn text-white" href="waste_requestu.php">View</a>
       </div>
      </div>
     </div>
     <!-- <div class="col-sm-4 mt-5">
      <div class="card text-white bg-success mb-3" style="max-width:18rem;">
       <div class="card-header">regular Waste Requests</div>
       <div class="card-body">
        <h4 class="card-title"></h4>
        <a class="btn text-white" href="work.php">View</a>
       </div>
      </div>
     </div> -->
     <div class="col-sm-4 mt-5">
      <div class="card text-white bg-info mb-3" style="max-width:18rem;">
       <div class="card-header">regular Waste Requests</div>
       <div class="card-body">
        <h4 class="card-title"><?php echo $regularrequest; ?></h4>
        <a class="btn text-white" href="waste_requestr.php">View</a>
       </div>
      </div>
     </div>
    </div>
    <div class="mx-5 mt-5 text-center">
     <p class="bg-dark text-white p-2">List of Requesters</p>
     <?php 
    
    
      $sql = "SELECT * FROM waste_request where confirm='0'";  
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '
       <table class="table">
        <thead>
         <tr>
          <th scope="col">Requester ID</th>
          <th scope="col">Name</th>
          <th scope="col">Date</th>
         </tr>
        </thead>
        <tbody>';
         while($row = $result->fetch_assoc()){
         echo '<tr>';
          echo '<td>'.$row["id"].'</td>';
          echo '<td>'.$row["name"].'</td>';
          echo '<td>'.$row["date"].'</td>';
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