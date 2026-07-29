
<?php
define('PAGE','editprofile');
include "../connection.php";
session_start();
if(isset($_SESSION['cpassword'])){
   $email = $_SESSION['cemail'];
} else {
   echo "<script> location.href='../intex/intex.php'</script>";
}

include('head.php');




$sql="select * from register where Email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        
      
        // define('PAGE','editprofile');
?>

            <!-- sidebar ends 1st column-->

            <!-- start of profile-->
            <div class="col-sm-6 mt-5">  <!-- Start Profile Area 2nd Column-->
                <form action="" method="POST" class="mx-5">

                    
                <div class="form-group pcolform">
                        <label  for="rEmail">ID</label>
                        <input type="number" class="form-control " name="id" id="rEmail" value="<?php echo $row['id'] ?>" readonly>
                    </div>

                    <div class="form-group pcolform">
                        <label  for="rEmail">Email</label>
                        <input type="email" class="form-control " name="Email" id="rEmail" value="<?php echo $row['Email'] ?>" readonly>
                    </div>

                    <div class="form-group pcolform">
                        <label  for="rName">Name</label>
                        <input type="text" class="form-control" name="FullName" id="rName" value="<?php echo $row['FullName'] ?>">
                    </div>

                    <div class="form-group pcolform">
                        <label  for="rEmail">Phone no.</label>
                        <input type="number" class="form-control " name="PhoneNo" id="rphone" value="<?php echo $row['PhoneNo'] ?>"readonly>
                    </div>

                    <div class="form-group pcolform">
                        <label   for="address" >Address</label>
                        <input type="text" class="form-control"  name="Address" id="raddress" value="<?php echo $row['Address'] ?>">
                    </div>
                      
                    <div class="form-group pcolform">
                        <label   for="pincode">pincode</label><br>
                        <input type="text" class="form-"  name="pincode" id="rPIN" value="<?php echo $row['pincode'] ?>">
                    </div>
                     
                    

                    <button type="submit" class="btn-m" style="margin-top: 10px;" name="nameupdate">Update</button>
                            <?php if(isset($passmsg)) {echo $passmsg;} ?>
                </form>
            </div>
            <!-- end of profile -->

        <?php 
        // if(isset($_POST['nameupdate'])){
           
        //     $id = $_POST['id'];
        //     $name = $_POST['FullName'];
        //     $email = $_POST['Email'];
        //     $pincode = $_POST['pincode'];
        //     $address = $_POST['Address'];
        
        //     // Perform validation on the submitted data
        //     if(empty($name) || empty($updatedEmail) || empty($pincode) || empty($address)){
        //         $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
        //     } else {
        //         // Use prepared statements to prevent SQL injection
        //         $updateQuery = "UPDATE register SET FullName = '$name', Email = '$email',  pincode= '$pincode', Address = '$address' WHERE id = '$id'";
        //         $stmt = mysqli_prepare($conn, $updateQuery);
        //         mysqli_stmt_bind_param($stmt, 'ssssi', $name, $updatedEmail, $pincode, $address, $id);
        
        //         if(mysqli_stmt_execute($stmt)){
        //             $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        //         } else {
        //             $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';
        //         }
        
        //         mysqli_stmt_close($stmt);
        //     }
        // }
        if(isset($_REQUEST['nameupdate'])){
            if(($_REQUEST['FullName'] == "") || ($_REQUEST['Email'] == "") || ($_REQUEST['PhoneNo'] == "") || ($_REQUEST['pincode'] == "") || ($_REQUEST['Address'] == "") ){
              $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
             } else {
              $id = $_REQUEST['id'];
              $name = $_REQUEST['FullName'];
              $email = $_REQUEST['Email'];
             
              $pincode = $_REQUEST['pincode'];
              $address = $_REQUEST['Address'];
              // $psellingcost = $_REQUEST['psellingcost'];
              $sql = "UPDATE register SET FullName = '$name', Email = '$email',  pincode= '$pincode', Address = '$address' WHERE id = '$id'";
               if($conn->query($sql) == TRUE){
                $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
                
               } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
               }
               echo '<meta http-equiv="refresh" content= "0" />';
             }
          }

        ?>


<?php
include "end.php";
?>

  