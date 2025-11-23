<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <button name="logout">Logout</button>
    </form>
    <?php
        session_start();
        if(isset($_POST['logout'])){
            unset($_SESSION['username']);
            header("location: ../index.php");
        }
        if(isset($_COOKIE["username"]) && $_SESSION['username']){
            header("location: Login.php");
        }
    ?>
</body>
</html>