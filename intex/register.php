<html>
    <head><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head>
</html>

<?php
session_start(); 

    include_once "../connection.php";
    
       if(isset($_POST['register'])){
          $FullName=$_POST['fullName'];
          
          $email =  $_POST['email'];

          $phone = $_POST['phoneNumber'];
          $password =  $_POST['password'];
          $pincode=$_POST['pincode'];
         
          $address =  $_POST['aadress'];
          $gender=  $_POST['gender'];
          $aadharno=$_POST['aadhaar-no'];
          $localarea=$_POST['localarea'];
          

          $name=$_FILES['aadhaarproof']['name'];
          $size=$_FILES['aadhaarproof']['size'];
          $type=$_FILES['aadhaarproof']['type'];
          $temp=$_FILES['aadhaarproof']['tmp_name'];
          $fname = rand(100,1000).'_'.$name;
          $_SESSION['email']=$email;
          $_SESSION['name']=$Fullname;
        
         $move =  move_uploaded_file($temp,"../pdf/".$fname);
         
        
          // check repeating mail
          $gmail = "SELECT * FROM register WHERE email='$email'";
          $result = $conn->query($gmail);

        
          if ($result->num_rows > 0) {

            $errore=" This Email id already used ";
            // echo"<script>alert('This Email id already used ');
            // document.location.href='intex.php';</script>";
            
          }
         else  { 
           // check repeating aadharno
          $sql = "SELECT * FROM register WHERE AadhaarNumber='$aadharno'";
          $result1=$conn->query($sql);
        
          if ($result1->num_rows > 0){
            $errora="This aadhar id allready used ";
          //  echo'<script>alert("This aadhar id allready used ");
          //  document.location.href="intex.php";
          //  </script>';
             
           
            } 
             else if (isset($errorp)){
             $errorp = "Please check the pincode";
            }
           else { // inserting  values

            $sql1="INSERT INTO register (id,FullName,AadhaarNumber,Email,PhoneNo,Password,Address,Gender,Aadharproof,pincode,localarea,otp)
            VALUES (null,'$FullName','$aadharno','$email','$phone','$password','$address','$gender','$fname','$pincode','$localarea','0')";
            $query=mysqli_query($conn,$sql1);
            

            // include_once 'otp-verification.php';

            echo"<script> alert('Register Successfully, OTP sent to email');
            window.location.replace('otp-verification.php');
            </script>";
            //echo"<script> alert('Registration successful!');
            // //  document.location.href='../login-page/index.php';
            // // </script>";
          
            }
          }
}
          
      
 mysqli_close($conn);     
        
?>