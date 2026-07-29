<?php 
session_start();
unset( $_SESSION['is_adminlogin']);
unset($_SESSION['aemail']);
echo "<script> location.href='login.php';</script>"
?>