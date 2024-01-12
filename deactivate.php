<html>
<head>
    <link rel="stylesheet" href="ski.css">
    <title>Skills</title>
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Deactivate skill
    if (isset($_POST['deactivate'])) {
        $id = $_POST['deactivate'];
        $updateQuery = "UPDATE skills SET active = 0 WHERE ID = $id";
        if (mysqli_query($connection, $updateQuery)) {
            echo "Skill deactivated successfully!";
        } else {
            echo "Error deactivating skill: " . mysqli_error($connection);
        }
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
        $category = $row['category'];
        $photo = $row['photo'];

        echo "<div class='skill-container'>";
        echo "<img src='downloads/$photo' alt='Skill Photo'>";
        echo "<p>date: $date</p>";
        echo "<p>title: $title</p>";
        echo "<p>description: $description</p>";
        echo "<p>category: $category</p>";
        echo "<form method='POST' action='view.php'>";
        echo "<input type='hidden' name='view' value='$ID'>";
        echo "<input type='submit' name='viewBtn' value='View'>";
        echo "</form>";
        echo "<form method='POST' action='edit.php'>";
        echo "<input type='hidden' name='edit' value='$ID'>";
        echo "<input type='submit' name='editBtn' value='Edit'>";
        echo "</form>";
        echo "<form method='POST' action=''>";
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
    <link rel="stylesheet" href="ski.css">
    <title>View Skill</title>
</head>
<body>
    <a href="skills.php">Back to Skills List</a>
</body>
</html>
