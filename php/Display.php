<?php
require "Connection.php";
require "Logout.php";


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
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        
        <?php

            $query = mysqli_query($conn,"select * from users");

            while($row= mysqli_fetch_array($query)){

                echo "
                    <tr>
                        <td>".$row["username"]."</td>
                        <td>".$row['email']."</td>
                        <td>
                            <a href='Update.php?update_id=".$row["user_id"]."'>Update</a>
                            <a href='Delete.php?delete_id=".$row["user_id"]."'>delete</a>
                        </td>
                    </tr>
                ";

            }


        ?>
    </table>
    
</body>
</html>