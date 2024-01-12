<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'veterans';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view'])) {
    $id = $_POST['view'];
    $selectQuery = "SELECT * FROM skills WHERE ID = $id";
    $result = mysqli_query($connection, $selectQuery);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $date = $row['date'];
        $title = $row['title'];
        $description = $row['description'];
       
        $photo = $row['photo'];

        // Display the skill information
        echo "<h2>Skill Details</h2>";
        echo "<p>Date: $date</p>";
        echo "<p>Title: $title</p>";
        echo "<p>Description: $description</p>";
       
        echo "<img src='downloads/$photo' alt='Skill Photo'>";
    }
}

mysqli_close($connection);
?>

<html>
<head>
    <link rel="stylesheet" href="ski.css">
    <title>View Skill</title>
</head>
<body>
    <a href="skills.php">Back to Skills List</a>
</body>
</html>