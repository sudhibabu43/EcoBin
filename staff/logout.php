<?php 
session_start();
unset($_SESSION['spassword']);
unset($_SESSION['semail']);
unset($_SESSION['is_stafflogin']);
echo "<script> location.href='../intex/intex.php';</script>"
?>