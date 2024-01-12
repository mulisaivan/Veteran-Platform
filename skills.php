
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
          <style>
          .skill-container {
  margin-bottom: 20px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.skill-container img {
  width: 200px;
  height: auto;
  display: block;
  margin-bottom: 10px;
}

.skill-container p {
  margin: 5px 0;
}

.skill-container form {
  display: inline-block;
  margin-right: 10px;
}

.skill-container input[type="submit"] {
  padding: 5px 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.skill-container input[type="submit"]:hover {
  background-color: #45a049;
}
.lab {
  display: block;
  margin-bottom: 5px;
}

.name2 {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

textarea.name2 {
  height: 100px;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}
</style>
    </head>
    <body>
        <div class="container">
            <aside>
                <div class="top">
                  <div class="logo">
                    <img src="Logo_Reserve.jpg">
                    <h2>Veteran<span class="danger">Platform</span></h2>
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
                <h3>Add Personnel</h3></a>
            
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
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'veterans';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// Add Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $ID = $_POST['ID'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description= $_POST['description'];
    $photo= $_POST['photo'];
    

    $sql = "INSERT INTO skills (ID, date, title, description, photo)
                    VALUES ('$ID', '$date', '$title', '$description', '$photo')";

    if (mysqli_query($connection, $insertQuery)) {
        echo "skills added successfully!";
    } else {
        echo "Error adding skills: " . mysqli_error($connection);
    }
}

// Fetch and display data from the database
$sql = "SELECT * FROM skills WHERE active = 1";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    
        $ID = $row['ID'];
        $date = $row['date'];
        $title = $row['title'];
        $description = $row['description'];
      
        $photo = $row['photo'];

        echo "<div class='skill-container'>";
        echo "<img src='downloads/$photo' alt='Skill Photo'>";
        echo "<p>date: $date</p>";
        echo "<p>title: $title</p>";
        echo "<p>description: $description</p>";
        echo "<form method='POST' action='view.php'>";
        echo "<input type='hidden' name='view' value='$ID'>";
        echo "<input type='submit' name='viewBtn' value='View'>";
        echo "</form>";
        echo "<form method='POST' action='edit.php'>";
        echo "<input type='hidden' name='edit' value='$ID'>";
        echo "<input type='submit' name='editBtn' value='Edit'>";
        echo "</form>";
        echo "<form method='POST' action='deactivate.php'>";
        echo "<input type='hidden' name='deactivate' value='$ID'>";
        echo "<input type='submit' name='deactivateBtn' value='Deactivate'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No active skills found.";
}

mysqli_close($connection);
?>
<h2>Add Skills</h2>
<form action="skills.php" method="POST" enctype="multipart/form-data">
<label  class="lab" for="date">Date:</label>
<input type="date" id="date" name="date" required class="name2"><br>

<label class="lab" for="photo">Photo:</label>
<input type="file" id="photo" name="photo" accept="image/*" required  class="name2"><br><br>

    <label class="lab" for="name">title:</label>
    <input type="text" id="name" name="name" required class="name2"><br><br>
    
    <label  class="lab" for="description">Description:</label>
    <textarea id="description" name="description" required class="name2"></textarea><br><br>

    <input type="submit"name="submit" value="submit">
  </form>
</body>
</html>