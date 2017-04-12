<?php session_start();
unset($_SESSION['username']);
unset($_SESSION['level']);
unset($_SESSION['nama']);
unset($_SESSION['idadmin']);
header("location:index.php");
?>