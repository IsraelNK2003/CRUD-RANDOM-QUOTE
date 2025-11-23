<?php
    require "Connection.php";
    require "Logout.php";
    $id = $_GET['update_id'];
    $result = mysqli_query($conn, "select * from users where user_id = $id");
    $values = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
    <style>
        body{
            color:white;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <h2 style="color:blue">Update account</h2>
        
        <input type="text" name="username" value="<?php echo $values['username'] ?>">
        <input type="text" name="email" value="<?php echo $values['email'] ?>">
        <input type="password" name="password" value="<?php echo $values['password'] ?>">
        <button name="button">Update</button>
    </form>

    <?php

        if(isset($_POST['button'])){
            
           $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $query = "update users set username='$username',email='$email',password='$password' where user_id=$id";

            if(mysqli_query($conn, $query)) {
                header("location: Display.php");
            }
            else{
                echo "fail";
            }

        }

    ?>
</body>
</html>