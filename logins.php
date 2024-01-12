

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <title>Document</title>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Login form submission
    $loginIdentifier = $_POST['login_identifier'];
        $password = $_POST['password'];
    $userType = $_POST['user_type'];

    if ($userType === 'admins') {
        $table = 'admins';
        $dashboardURL = 'bord.html';
    } elseif ($userType === 'users') {
        $table = 'users';
        $dashboardURL = 'proper.html';
    } else {
        echo "Invalid user type selected.";
        exit;
    }

    $sql = "SELECT * FROM $table WHERE (email = '$loginIdentifier' OR username = '$loginIdentifier')";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $password) {
            // Successful login
            header("Location: $dashboardURL");
            exit;
        } else {
            //echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}
?>

<!-- HTML Login Form -->


<center>  
    
    <div class="container"  style="margin-top: 5rem; background-color: rgb(15, 122, 136); width: 30rem;height: 30rem;border-radius: 10PX; ">
    <div class="grid1"  >
 

       <p><h3>Welcome to Login Page.</h3></p> 
     <div class="grid2">
       <form method="POST" action="logins.php">
        <!-- Login form fields -->
        <label for="login_identifier">Email or Username:</label>
        <input type="text" id="login_identifier" name="login_identifier" placeholder="Enter Your Email or username" required style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required placeholder="Enter Your password" required style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>

        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type"  style=" margin-top: 2rem; height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;">
           
            <option value="admins">Admin</option>
            <option value="users">user</option>
        </select><br>

     

   
        <input type="submit" value="Login" style="background-color: rgb(119, 117, 115); height: 2rem; width: 12rem; border-radius: 8px;  ">
    </form
       
           
       <p>If you don't have any account you can now<a href="registst.php" style="color: rgb(15, 122, 136); text-decoration: none; font-weight: 900;background-color: rgb(0, 0, 0); font-size:20"> REGISTER</a>here.</p><br>
       
   
    </div></form><p> <a href="forgetpassword.html">Forget your Password?</a> </p>
   </div></center> 
</div>
        <div class="part0">
            <h3><span>Rwanda, Kigali,kacyiru</span></h3>
           <h3><span>phoneNumber:+25783242043</span></h3>
           <h3><span>Email: reserveforce4@gmail.com</span></h3>
        </div>
        <h3><div class="partcopy"> CopyRight &copy2023 , Developed By <b>MULISA</h3></div>
    </div>
       </center>
</body>
</html>




