<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ecobin";


$conn =mysqli_connect($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
}
// if($conn)
// {
//   echo"conform";
// }
?>