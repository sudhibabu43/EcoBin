<?php
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../connection.php');
session_start();
if(isset($_SESSION['is_stafflogin'])){
   $sEmail = $_SESSION['semail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">List of conformation</p>
 <?php 
  $sql = "SELECT * FROM waste_request where confirm='1'"; 
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">Request id</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">Address</th>';
      echo '<th scope="col">Email</th>';
   
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$row["id"].'</td>';
       echo '<td>'.$row["name"].'</td>';
       echo '<td>'.$row["address"].'</td>';
       echo '<td>'.$row["email"].'</td>';
       echo '<td>';
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$row["id"].'><button type="submit" class="btn btn-secondary mr-3" name="collected" value="Collected"><i class="fas fa-handshake"></i></button>';
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
 if(isset($_REQUEST['collected'])){

   $id=$_REQUEST['id'];
   $sql="INSERT INTO waste_request_confirm(id,name,address,date,time)
   SELECT id,name,address,date,time FROM waste_request where id=$id";
   $result = mysqli_query($conn, $sql);
   $sql = "DELETE FROM waste_request WHERE id = {$id}";
   if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
   } else {
  echo 'Unable to Delete';
 }
 }
?>

 <!-- JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
 </body>
</html>