<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterans";

// Create a new connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit"])) {
    $id = $_POST["edit"];
    $dates = $_POST["Dates"];
    $names = $_POST["Names"];
    $dob = $_POST["DOB"];
    $rank = $_POST["Rank"];
    $unit = $_POST["Unit"];
    $gender = $_POST["Gender"];
    $disease = $_POST["Disease"];
    $medication = $_POST["Medication"];

    // Prepare and execute the update query
    $updateQuery = "UPDATE health SET 
                    Dates = '$dates',
                    Names = '$names',
                    DateOfBirth = '$dob',
                    Rank = '$rank',
                    Unit = '$unit',
                    Gender = '$gender',
                    Disease = '$disease',
                    Medication = '$medication'
                    WHERE id = '$id'";

    if (mysqli_query($connection, $updateQuery)) {
        echo "Health information updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

// Check if the edit button is clicked and an ID is provided
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit"])) {
    $id = $_POST["edit"];

    // Retrieve the person's information from the database based on their ID
    $selectQuery = "SELECT * FROM health WHERE id = '$id'";
    $result = mysqli_query($connection, $selectQuery);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $dates = $row["Dates"];
        $names = $row["Names"];
        $dob = $row["DateOfBirth"];
        $rank = $row["Rank"];
        $unit = $row["Unit"];
        $gender = $row["Gender"];
        $disease = $row["Disease"];
        $medication = $row["Medication"];

        // Display the form for editing
        ?>
        <form action="" method="POST">
            <input type="hidden" name="edit" value="<?php echo $id; ?>">
            <label for="Dates">Dates:</label>
            <input type="text" id="Dates" name="Dates" value="<?php echo $dates; ?>"><br>

            <label for="Names">Names:</label>
            <input type="text" id="Names" name="Names" value="<?php echo $names; ?>"><br>

            <label for="DOB">Date of Birth:</label>
            <input type="text" id="DOB" name="DOB" value="<?php echo $dob; ?>"><br>

            <label for="Rank">Rank:</label>
            <input type="text" id="Rank" name="Rank" value="<?php echo $rank; ?>"><br>

            <label for="Unit">Unit:</label>
            <input type="text" id="Unit" name="Unit" value="<?php echo $unit; ?>"><br>

            <label for="Gender">Gender:</label>
            <input type="text" id="Gender" name="Gender" value="<?php echo $gender; ?>"><br>

            <label for="Disease">Disease:</label>
            <input type="text" id="Disease" name="Disease" value="<?php echo $disease; ?>"><br>

            <label for="Medication">Medication:</label>
            <input type="text" id="Medication" name="Medication" value="<?php echo $medication; ?>"><br>

            <input type="submit" value="Save Changes">
        </form>
        <?php
    } else {
        echo "Person not found.";
    }
}

// Close the database connection
mysqli_close($connection);
?>