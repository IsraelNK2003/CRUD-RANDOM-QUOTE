<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Quote</title>
</head>
<body>
    <?php
    include 'connection.php';
    
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete =mysqli_query($conn,"DELETE FROM quote WHERE id = '$id'");
        if($delete){
            echo "<p style='color:red'>Message deleted</p>";
        }else{
            echo"Delete querry failed";
        }
    }


    $edit = false;
    $edit_id = '';
    $edit_message = '';
    if(isset($_GET['update'])){
        $edit_id = $_GET['update'];
        $edit = true;
        $selection = mysqli_query($conn,"SELECT * FROM quote WHERE id = '$edit_id'");
        $sel_fet = mysqli_fetch_array($selection);
        $edit_message = $sel_fet['message'];

        if(isset($_POST['update'])){
        $message = $_POST['message'];
        $update = mysqli_querry($conn,"UPDATE quote SET message = '$message' where id = '$edit_id'");
        if($update){
            echo "<p style='color:green'>Message UPdated!</p>";
        }else{
            echo"UPdate querry failed";
        }
    }
    }

    if(isset($_POST['submit'])){
        $message = $_POST['message'];
        $querry = mysqli_query($conn,"INSERT INTO quote VALUES('','$message')");
  if($querry){
            echo "<p style='color:green'>Message Added!</p>";
        }else{
            echo"Insert querry failed";
        }
  }


    ?>
   <form action="" method="POST">

     <textarea name="message" rows="4" cols="50" placeholder="Enter message..."><?php echo $edit_message; ?></textarea><br><br>

     <?php if($edit_id):?>
      <input type="submit" name="update" value="update">
      <a href="quotes.php">cancel</a>
      <?php else:?>
        <input type="submit" name="submit" value="Add Message">
        <?php endif;?>

   </form>

   <table border="">
        <tr>
            <th>No</th>
            <th>QUOTE</th>
            <th colspan="2">ACTIONS</th>
        </tr>
       <?php
       $select = mysqli_query($conn,"SELECT * FROM quote");

       
      if(mysqli_num_rows($select)){
        while($row = mysqli_fetch_array($select)){

        
    
       ?>

        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['message'];?></td>
            <td><a href="?delete=<?php echo $row['id'];?>">Delete</a></td>
            <td><a href="?update=<?php echo $row['id'];?>">Edit</a></td>
        </tr>
    <?php }}?>
   </table>

   <div style="background-color:black; width:800px; height:200px; padding:20px; color:white;">
      <?php  $select = mysqli_query($conn, "SELECT * FROM quote");
      $num = mysqli_num_rows($select);
      while($row = mysqli_fetch_array($select)){
        $array[] = $row['message'];
      }
      $random_quote = $array[array_rand($array)];
      

      echo $random_quote;  ?>
   </div>

</body>
</html>