<html>
    <head>
      
            <link rel="stylesheet" href="updates.css">
            
        <title>updates</title>
    </head>
<body>
<?php
// Define database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterans";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];

    // Handle uploaded photo
    $photoTmpName = $_FILES['image']['tmp_name'];
    $photoName = $_FILES['image']['name'];
    $photoSize = $_FILES['image']['size'];
    $photoError = $_FILES['image']['error'];

    // Check if photo uploaded successfully
    if ($photoError === UPLOAD_ERR_OK) {
        // Specify the target directory to save the file
        $targetDir = 'downloads';
        $targetFilePath = $targetDir . 'downloads' . $photoName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($photoTmpName, $targetFilePath)) {
            // Insert form data into the database
            $sql = "INSERT INTO updates (date, title, description, author, photo) VALUES ('$date', '$title', '$description', '$author', '$targetFilePath')";

            if ($conn->query($sql) === TRUE) {
                // Display success message
                echo 'Form submitted successfully.';
            } else {
                // Display error message
                echo 'Error: ' . $sql . '<br>' . $conn->error;
            }
        } else {
            // Display error message
            echo 'Error moving the uploaded file.';
        }
    } else {
        // Display error message
        echo 'Error uploading the photo.';
    }
}

// Close the database connection
$conn->close();
?>


<form action="" method="POST" enctype="multipart/form-data">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date"><br>

    <label for="image">Photo:</label>
    <input type="file" id="image" name="image"><br>

    <label for="title">Title:</label>
    <input type="text" id="title" name="title"><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea><br>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author"><br>

    <input type="submit" value="Submit">
</form>
</body>
  </html>



























