
<?php
  
       if(isset($_POST['submit'])){
          $name=$_POST['name'];
          
          $email =  $_POST['email'];
          $type =  $_POST['type'];

          $phone = $_POST['phone'];
          
          $pincode=$_POST['pincode'];
          $description=$_POST['description'];
         
          $address =  $_POST['address'];
          $time=  $_POST['requesttime'];
          $date=$_POST['requestdate'];
         
        
          // check repeating mail
         
          $gmail = "SELECT * FROM waste_request WHERE email='$email'";
          $result = $conn->query($gmail);

        
          if ($result->num_rows > 0) {

            
             echo"<script>alert('Already you have sent a request ');
            </script>";
            
          }else {

            $sql="INSERT INTO waste_request (id,type,date,time,email,name,pincode,phone,address,confirm,description)
            VALUES (null,'$type','$date','$time','$email','$name','$pincode','$phone','$address','0','$description')";
           $query=mysqli_query($conn,$sql);
            
          
            echo"<script> alert('Request Sented');
            window.location.href = 'success_request.php';</script>";
            
           } // header('location :success_request.php');
          

          
       }
        
 mysqli_close($conn);     
        
?>