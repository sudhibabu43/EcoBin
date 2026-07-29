

<?php 
    include '../connection.php';

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql1="select email,password from register where id='$id'";
        $result1=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($result1);
        $email=$row['email'];
        $password=$row['password'];

        $sql = "insert into login(id,email,password) value (0,'$email','$password')";
        $result=mysqli_query($conn,$sql);
        header('location :admin.php');
    }
?>