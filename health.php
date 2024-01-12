<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="heal.css">
    <title>Health</title>
</head>
<body>
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
    $Dates = $_POST['dates'];
    $Names = $_POST['names'];
    $DOB = $_POST['dob'];
    $Rank = $_POST['ranks'];
    $Unit = $_POST['units'];
    $Gender = $_POST['gender'];
    $Disease = $_POST['diseases'];
    $Medication = $_POST['medications'];

    $insertQuery = "INSERT INTO health (Dates, Names, DateOfBirth, Rank, Unit, gender, disease, Medication) 
                    VALUES ('$Dates', '$Names', '$DOB', '$Rank', '$Unit', '$Gender', '$Disease', '$Medication')";

    if (mysqli_query($connection, $insertQuery)) {
        echo "Personnel added successfully!";
    } else {
        echo "Error adding personnel: " . mysqli_error($connection);
    }
}

// Delete Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $deleteQuery = "DELETE FROM health WHERE id = '$id'";
    if (mysqli_query($connection, $deleteQuery)) {
        echo "Health information deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
}

// Edit Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $dates = $_POST['Dates'];
    $names = $_POST['Names'];
    $dob = $_POST['DOB'];
    $rank = $_POST['Rank'];
    $unit = $_POST['Unit'];
    $gender = $_POST['Gender'];
    $disease = $_POST['Disease'];
    $medication = $_POST['Medication'];

    $updateQuery = "UPDATE health SET 
                    Dates = '$dates',
                    Names = '$names',
                    DateOfBirth = '$dob',
                    Rank = '$rank',
                    Unit = '$unit',
                    gender = '$gender',
                    disease = '$disease',
                    Medication = '$medication'
                    WHERE id = '$id'";

    if (mysqli_query($connection, $updateQuery)) {
        echo "Health information updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
// View Action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view'])) 
    $id = $_POST['view'];


// Fetch existing health information
$selectQuery = "SELECT * FROM health";
$result = mysqli_query($connection, $selectQuery);
$healthInformation = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                    <h2><span class="danger">VeteranPlatform</span></h2>
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




  <h1>Health Section - Admin</h1>

  <h2>Add New Health Information</h2>
  <form method="POST" action="">
    <table>
      <thead>
        <tr>
          <th>Dates</th>
          <th>Names</th>
          <th>DOB</th>
          <th>Rank</th>
          <th>Unit</th>
          <th>Gender</th>
          <th>Disease</th>
          <th>Medication</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="dates" required></td>
          <td><input type="text" name="names" required></td>
          <td><input type="text" name="dob" required></td>
          <td><input type="text" name="ranks" required></td>
          <td><input type="text" name="units" required></td>
          <td><input type="text" name="gender" required></td>
          <td><input type="text" name="diseases" required></td>
          <td><input type="text" name="medications" required></td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
    <div>
      <button type="submit" name="add">Add Information</button>
    </div>
  </form>

  <!-- Existing information table -->
  <h2>Existing Health Information</h2>
  <table>
    <thead>
      <tr>
       <th>ID</th>
        <th>Dates</th>
        <th>Names</th>
        <th>DOB</th>
        <th>Rank</th>
        <th>Unit</th>
        <th>Gender</th>
        <th>Disease</th>
        <th>Medication</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($healthInformation as $info) : ?>
        <tr>
          <form method="POST" action="">
            <td><?php echo $info['id']; ?></td>
            <td><?php echo $info['dates']; ?></td>
            <td><?php echo $info['Names']; ?></td>
            <td><?php echo $info['DateOfBirth']; ?></td>
            <td><?php echo $info['Rank']; ?></td>
            <td><?php echo $info['Unit']; ?></td>
            <td><?php echo isset($info['Gender']) ? $info['Gender'] : ''; ?></td>
            <td><?php echo $info['disease']; ?></td>
            <td><?php echo $info['Medication']; ?></td>
            <td>
              <button type="submit" name="edit" action='editing.php'><?echo $info['id']; ?>Edit</button>
              <button type="submit" name="delete" value="<?php echo $info['id']; ?>">Delete</button>
            </td>
          </form>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>