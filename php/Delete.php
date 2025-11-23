
<?php
    require "Connection.php";
    $id= $_GET['delete_id'];
    $query = "delete from users where user_id= $id";

    if(mysqli_query($conn, $query)) {
        header("location: Display.php");
    }
    else{
        echo "fail";
    }


    ?>


