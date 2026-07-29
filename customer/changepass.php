<?php
define('PAGE','changepass');
session_start();
include('head.php');
include "../connection.php";


if(isset($_SESSION['cpassword'])){
   $email = $_SESSION['cemail'];
} else {
   echo "<script> location.href='../intex/intex.php'</script>";
}
?>

<div class="col-sm-9 col-md-10"> <!-- Start User Change Password Form 2nd Column -->
    <form class="mt-5 mx-5" action="" method="POST">

        <div class="form-group col-md-2">
            <label for="inputEmail">Email</label>
            <input  class="form-control" id="inputEmail" name="email" value="<?php echo $email; ?>" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="inputnewpassword">New Password</label>
            <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="password">
        </div>
        <div class="pl-3">
            <button type="submit" class="btn-m" name="passupdate">
                Update
            </button>
        
            <button type="reset" class="btn-m ml-3">
                Reset
            </button>
        </div>
    

        <?php if(isset($passmsg)){echo $passmsg;} ?>

    </form>
</div> <!-- End User Change Password Form 2nd Column -->
<?php 
    if(isset($_POST['passupdate'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql = "UPDATE login SET Password='$password' WHERE Email = '$email'";
               if($conn->query($sql) == TRUE){
                $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
               } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
               }
    }
    ?>

<?php
include('end.php');
?>
