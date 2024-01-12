<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bord.css">
    <title>messages</title>
    <style>
    table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

button[type="submit"] {
  padding: 5px 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

label {
  display: block;
  margin-bottom: 5px;
}

textarea {
  width: 100%;
  height: 100px;
  resize: vertical;
  padding: 5px;
}
   </style>
</head>
<body>
    <?php
    // Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterans";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  

        // Delete message from the database
        if (isset($_POST['delete_message_id'])) {
            $messageId = $_POST['delete_message_id'];

            $deleteQuery = "DELETE FROM messages WHERE id = '$messageId'";

            if ($conn->query($deleteQuery) === TRUE) {
                echo "Message deleted successfully!";
            } else {
                echo "Error deleting message: " . $conn->error;
            }
        }

      

        // Reply to the message
        if (isset($_POST['reply_message_id']) && isset($_POST['reply'])) {
            $messageId = $_POST['reply_message_id'];
            $reply = $_POST['reply'];

            $selectQuery = "SELECT email FROM messages WHERE id = '$messageId'";
            $result = $conn->query($selectQuery);
            $row = $result->fetch_assoc();
            $email = $row['email'];

            // Send the reply email using $email and $reply
            // ...

            echo "Reply sent successfully!";
        }
    

    // Fetch existing messages
    $selectQuery = "SELECT * FROM messages";
    $result = $conn->query($selectQuery);
    $messages = $result->fetch_all(MYSQLI_ASSOC);
    ?>

    
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
          rel="stylesheet">
          <link rel="stylesheet" href="bord.css">
          <link rel="stylesheet" href="personal.html">
          <title> VET DashBoard</title>
            
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                  <div class="logo">
                    <img src="Logo_Reserve.jpg">
                    <h2><span class="danger">Veteran Platform</span></h2>
                  </div>
                    <div class="close" id="close-btn">
                      <span class="material-icons-sharp">
                        close
                      </span>
                    </div>
                </div>
    
        <div class="sidebar">
            <a href="#">
                <span class="material-icons-sharp">
                    grid_view
                    </span>
                <h3>DashBoard</h3>
            </a>
               
            <a href="bord.html">
                <span class="material-icons-sharp">
                    receipt_long
                    </span>
                <h3>Home</h3>
            </a>
            <a href="updates.php">
                <span class="material-icons-sharp">
                    insights
                    </span>
                <h3>Updates</h3>
            </a>
          
            
            <a href="skills.php">
                <span class="material-icons-sharp">
                    inventory
                    </span>
                <h3>Skills</h3>
            </a>
            <a href="health.php">
                <span class="material-icons-sharp">
                    report_gmailerrorred
                    </span>
                <h3>Health</h3>
            </a>
                    <a href="messages.php">
                        <span class="material-icons-sharp">
                        email 
                        </span>   
                <h3>Messages</h3>
                <span class="message-count">02</span>
            </a>
            <a href="settings.html">
                <span class="material-icons-sharp">
                    settings
                    </span>
                <h3>Settings</h3>
            </a>
            <a href="retires.php">
                <span class="material-icons-sharp">
                    add
                    </span>
                <h3>Add Personnel</h3>
            </a>
            <a href="proper.html">
                <span class="material-icons-sharp">
                    logout
                    </span>
                <h3>Logout</h3>
            </a>
        </div>
        </aside>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                        </span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                            dark_mode
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Ivan</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="gd.jpg">
                    </div>
                    </div>
                </div>

    <table>
        <tr>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php foreach ($messages as $message): ?>
            <tr>
                <td><?php echo $message['email']; ?></td>
                <td><?php echo $message['subject']; ?></td>
                <td><?php echo $message['message']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="delete_message_id" value="<?php echo $message['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>

                    <form method="post" action="">
                        <input type="hidden" name="reply_message_id" value="<?php echo $message['id']; ?>">
                        <label for="reply">Reply:</label>
                        <textarea name="reply" required></textarea><br>
                        <button type="submit">Reply</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

   
</body>
</html>