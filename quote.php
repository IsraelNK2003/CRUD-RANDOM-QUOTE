<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote Manager</title>
</head>
<body>
    <h2>QUOTE MANAGER</h2>

    <?php
    // Connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'random');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Add new message
    if (isset($_POST['add'])) {
        $message = $_POST['message'];
        if (!empty($message)) {
            mysqli_query($conn, "INSERT INTO quote (message) VALUES ('$message')");
            echo "<p style='color:green;'>Message added successfully!</p>";
        }
    }

    // Delete message
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM quote WHERE id=$id");
        echo "<p style='color:red;'>Message deleted!</p>";
    }

    // Update message
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $message = $_POST['message'];
        mysqli_query($conn, "UPDATE quote SET message='$message' WHERE id=$id");
        echo "<p style='color:blue;'>Message updated!</p>";
    }

    // Check if editing
    $edit_mode = false;
    $edit_id = '';
    $edit_message = '';

    if (isset($_GET['edit'])) {
        $edit_mode = true;
        $edit_id = $_GET['edit'];
        $result = mysqli_query($conn, "SELECT * FROM quote WHERE id=$edit_id");
        $row = mysqli_fetch_assoc($result);
        $edit_message = $row['message'];
    }
    ?>

    <!-- Form for add or edit -->
    <form action="" method="POST">
        <textarea name="message" rows="4" cols="50" placeholder="Enter message..."><?php echo $edit_message; ?></textarea><br><br>

        <?php if ($edit_mode): ?>
            <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
            <input type="submit" name="update" value="Update Message">
            <a href="quotes.php">Cancel</a>
        <?php else: ?>
            <input type="submit" name="add" value="Add Message">
        <?php endif; ?>
    </form>

    <hr>

    <h3>All Messages</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM quote");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['message']) . "</td>";
                echo "<td>
                        <a href='?edit=" . $row['id'] . "'>Edit</a> | 
                        <a href='?delete=" . $row['id'] . "' onclick=\"return confirm('Delete this message?');\">Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No messages found.</td></tr>";
        }
        ?>
    </table>

    <hr>

    <!-- Display a random message -->
    <?php
    $select = mysqli_query($conn, "SELECT * FROM quote");
    if (mysqli_num_rows($select) > 0) {
        $messages = [];
        while ($row = mysqli_fetch_assoc($select)) {
            $messages[] = $row['message'];
        }
        $random_message = $messages[array_rand($messages)];
        ?>
        <div style="background-color:black; color:white; padding:10px; width:50%; margin-top:20px;">
            <h4>Random Message:</h4>
            <p><?php echo $random_message; ?></p>
        </div>
    <?php } ?>  

</body>
</html>
