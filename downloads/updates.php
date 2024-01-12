<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="bord.css">
    <link rel="stylesheet" href="personal.html">
    <title>VET DashBoard</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9e9e9;
        }
        table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #e9e9e9;
}

.action-links {
    display: flex;
    justify-content: center;
    gap: 5px;
}

.action-links a {
    display: block;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    color: #333;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.lab {
  display: block;
  margin-bottom: 5px;
}

.name3 {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

textarea.name3 {
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


            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "veterans";

            // Create a new connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $date = $_POST["date"];
                $title = $_POST["title"];
                $description = $_POST["description"];
                $author = $_POST["author"];
               

                // Insert the date into the database
                $sql = "INSERT INTO updates (date,title,description,photo,author) VALUES ('$date','$title','$description','photo','author')";

                if ($conn->query($sql) === TRUE) {
                    echo "updated successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Retrieve all updates from the database
            $sql = "SELECT * FROM updates";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Date</th>";
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Author</th>";
                echo "<th>photo</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["author"] . "</td>";
                    echo "<td>" . $row["photo"] . "</td>";
                   
                    echo "<td>";
                    echo "<a href='updates.php?id=" . $row["id"] . "'>View</a>";
                    echo "<a href='updates.php?id=" . $row["id"] . "'>Edit</a>";
                    echo "<a href='updates.php?id=" . $row["id"] . "'>Deactivate</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No updates found";
            }

            $conn->close();
            ?>

            <h2>Add Update</h2>
            <form action="updates.php" method="POST" enctype="multipart/form-data">
        <label class="lab" for="date">Date:</label>
        <input type="date" id="date" name="date" required class="name3"><br>

        <label class="lab" for="photo">Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required class="name3"><br>

        <label class="lab" for="title">Title:</label>
        <input type="text" id="title" name="title" required class="name3"><br>

        <label class="lab" for="description">Description:</label>
        <textarea id="description" name="description" required class="name3"></textarea><br>

        <label class="lab" for="author">Author:</label>
        <input type="text" id="author" name="author" required class="name3"><br>

        <input type="submit" value="Submit">
    </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#menu-btn").click(function () {
                $(".sidebar").toggleClass("active");
                $(".right").toggleClass("active");
            });

            $("#close-btn").click(function () {
                $(".sidebar").removeClass("active");
                $(".right").removeClass("active");
            });
        });
    </script>

</body>

</html>