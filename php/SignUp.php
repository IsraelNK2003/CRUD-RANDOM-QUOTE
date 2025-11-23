
<?php
    require "Connection.php";


    if(isset($_POST['signin'])){

        $username = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $confirm = $_POST['cpass'];
        if($password == $confirm){
            
            $query = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";

            if(mysqli_query($conn, $query)) {
                header("location: Display.php");
            }
            else{
                echo "fail";
            }
        }else{
            echo "password are not same";
        }

    }

?>