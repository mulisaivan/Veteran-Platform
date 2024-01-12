<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
    <title>Admin Registration</title>
</head>
<body>

    <?php
    // Establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "veterans";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        // Insert data into the admin table
        $sql = "INSERT INTO admins (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

<h2>Admin Registration</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>