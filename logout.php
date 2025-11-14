<?php 
$conn = mysqli_connect('localhost','root','','random');
session_start();
session_destroy();
header('location:login.php');
?>