<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'veterans';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $selectQuery = "SELECT * FROM skills WHERE ID = $id";
    $result = mysqli_query($connection, $selectQuery);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $date = $row['date'];
        $title = $row['title'];
        $description = $row['description'];
       
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
 $photo = $_POST['photo'];

    $updateQuery = "UPDATE skills SET date = '$date', title = '$title', description = '$description', category = '$category' WHERE ID = $id";

    if (mysqli_query($connection, $updateQuery)) {
        echo "Skill updated successfully!";
    } else {
        echo "Error updating skill: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<html>
<head>
    <link rel="stylesheet" href="ski.css">
    <title>Edit Skill</title>
</head>
<body>
    <h2>Edit Skill</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Date:</label>
        <input type="text" name="date" value="<?php echo $date; ?>"><br><br>
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>"><br><br>
        <label>Description:</label>
        <input type="text" name="description" value="<?php echo $description; ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
<body>
    <a href="skills.php">Back to Skills List</a>
</body>
</html>