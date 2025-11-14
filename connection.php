<?php  

$conn = mysqli_connect('localhost','root','','random');
session_start();

if($_SESSION['my_session']){
}else{
    header('location:login.php');
    
}

?>