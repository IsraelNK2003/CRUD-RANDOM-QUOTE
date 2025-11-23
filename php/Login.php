
<?php
    require "connection.php";
    // if(isset($_POST['submit'])){
         $username = $_POST["username"];
         $email = $_POST["email"];
         $password = $_POST["password"];
        //  $remember = $_POST['remember'];
        // if($remember == "on"){
        //     echo "yes";     
        //     setcookie("username",$username,time() +600);
        // }
        $query = "select * from users where username='$username' and password='$password'";
        // echo
        $res = mysqli_query($conn,$query);
        $output  = mysqli_fetch_array($res);
        if($output){
            session_start();
            $_SESSION['username'] = $output['username'];
            header("location:Display.php");
        }
        else echo "not found";
    // }

?>
