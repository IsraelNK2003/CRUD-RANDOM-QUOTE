<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$conn = mysqli_connect('localhost','root','','random');

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
   


    $select = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' && password = '$password'");
$num = mysqli_num_rows($select);

    if($num > 0){
        session_start();
        $_SESSION['my_session'] = $_POST['email'];
        
        header('location:quote.php');
    }else{
        echo "<p style='color:red'>Invalid Credentials!</p>";
    }
    

}


?>
    <h2>Login HERE</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email"><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        

        <input type="submit" name="login" value="Login">
        
    </form>

</body>
</html>