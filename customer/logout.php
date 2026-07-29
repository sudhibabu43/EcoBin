<?php 
session_start();
unset($_SESSION['cpassword']);
unset($_SESSION['cemail']);
echo "<script> location.href='../intex/intex.php';</script>"
?>