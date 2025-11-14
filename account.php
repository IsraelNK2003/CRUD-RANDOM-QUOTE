<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include 'connection.php';

if(isset($_POST['create'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    if($password === $conf_password){


    $create = mysqli_query($conn,"INSERT INTO users VALUES('','$email','$password')");
    if($create){
        echo "<p style='color:green'>User Created!</p>";
    }
    
}else{
    echo "<p style='color:red'>Password not match!</p>";

}
}


?>
    <h2>CREATE ACCOUNT HERE</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        
        <label for="conf_password">Confirm Password:</label>
        <input type="password" name="conf_password"><br>

        <input type="submit" name="create" value="CREATE ACCOUNT">
        
    </form>
</body>
</html>