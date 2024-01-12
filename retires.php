<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="retires.css">
    <title>Retires</title>
</head>
<body>
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'veterans';

// Database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add personnel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $rank = $_POST['rank'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $armynumber = $_POST['armynumber'];
    $unit = $_POST['unit'];
    $dob = $_POST['dob'];

    $insertQuery = "INSERT INTO retires (firstname, lastname, gender, rank, email, phone, armynumber, unit, dob) 
                    VALUES ('$firstname', '$lastname', '$gender', '$rank', '$email', '$phone', '$armynumber', '$unit', '$dob')";
    $conn->query($insertQuery);

    if ($conn->query($insertQuery)) {
        // Success message
        echo "Personnel information added successfully.";
    } else {
        // Error message
        echo "Error adding personnel information: " . $conn->error;
    }
}

// Edit personnel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $firstname = $_POST['firstname'][$id] ?? '';
    $lastname = $_POST['lastname'][$id] ?? '';
    $gender = $_POST['gender'][$id] ?? '';
    $rank = $_POST['rank'][$id] ?? '';
    $email = $_POST['email'][$id] ?? '';
    $phone = $_POST['phone'][$id] ?? '';
    $armynumber = $_POST['armynumber'][$id] ?? '';
    $unit = $_POST['unit'][$id] ?? '';
    $dob = $_POST['dob'][$id] ?? '';

    $updateQuery = "UPDATE retires SET firstname='$firstname', lastname='$lastname', gender='$gender', rank='$rank', 
                    email='$email', phone='$phone', armynumber='$armynumber', unit='$unit', dob='$dob' WHERE id='$id'";
    $conn->query($updateQuery);

    if ($conn->query($updateQuery)) {
        // Success message
        echo "Personnel information updated successfully.";
    } else {
        // Error message
        echo "Error updating personnel information: " . $conn->error;
    }
}

// Deactivate personnel
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deactivate'])) {
    $id = $_POST['deactivate'];

    $deactivateQuery = "UPDATE retires SET active = 0 WHERE id='$id'";
    $conn->query($deactivateQuery);

    if ($conn->query($deactivateQuery)) {
        // Success message
        echo "Personnel deactivated successfully.";
    } else {
        // Error message
        echo "Error deactivating personnel: " . $conn->error;
    }
}

// Fetch personnel information
$selectQuery = "SELECT * FROM retires";
$result = $conn->query($selectQuery);
$personnelInformation = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $personnelInformation[] = $row;
    }
}

// View Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view'])) 
    $id = $_POST['view'];

    // Fetch the personnel information by ID
    $id = $conn->real_escape_string($id);
    $selectQuery = "SELECT * FROM retires WHERE id = '$id'";
    $result = $conn->query($selectQuery);
    $personnel = $result->fetch_assoc();
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

<h2>Add Personnel</h2>
<form method="POST" action="retires.php">
    <label for="firstname">Firstname:</label>
    <input type="text" name="firstname" required><br>

    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" required><br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br>

    <label for="rank">Rank:</label>
    <input type="text" name="rank" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" required><br>

    <label for="armynumber">Army Number:</label>
    <input type="text" name="armynumber" required><br>

    <label for="unit">Unit:</label>
    <input type="text" name="unit" required><br>

    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" required><br>

    <input type="submit" name="add" value="Add">
</form>

<h2>Personnel List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Rank</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Army Number</th>
        <th>Unit</th>
        <th>Date of Birth</th>
        <th>Action</th>
    </tr>
    <?php foreach ($personnelInformation as $personnel) { ?>
        <tr>
            <td><?php echo $personnel['id']; ?></td>
            <td><?php echo $personnel['firstname']; ?></td>
            <td><?php echo $personnel['lastname']; ?></td>
            <td><?php echo $personnel['gender']; ?></td>
            <td><?php echo $personnel['rank']; ?></td>
            <td><?php echo $personnel['email']; ?></td>
            <td><?php echo $personnel['phone']; ?></td>
            <td><?php echo $personnel['armynumber']; ?></td>
            <td><?php echo $personnel['unit']; ?></td>
            <td><?php echo $personnel['dob']; ?></td>
            <td>
                <form method="POST" action="retires.php">
                    <input type="hidden" name="view" value="<?php echo $personnel['id']; ?>">
                    <input type="submit" value="View">
                </form>
                <form method="POST" action="retires.php">
                    <input type="hidden" name="edit" value="<?php echo $personnel['id']; ?>">
                    <input type="submit" value="Edit">
                </form>
                <form method="POST" action="retires.php">
                    <input type="hidden" name="deactivate" value="<?php echo $personnel['id']; ?>">
                    <input type="submit" value="Deactivate">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>