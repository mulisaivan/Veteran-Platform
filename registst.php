<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <title>registration</title>
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
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $userName = $_POST['user_name'];
    $password = $_POST['password'];
   

   

    $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$firstName', '$lastName', '$email', '$userName', '$password')";

    if (mysqli_query($connection, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>

<center> 
<div class="container"  style="margin-top: 1.6rem; background-color: rgb(15, 122, 136); width: 30rem;height: 35rem; border-radius: 10PX;">
                    <div class="grid1" style="" >
                    <p><h3>REGISTER</h3></p>   
                    </div>
                    <form method="POST" action="registst.php">
                    <div class="grid2" >
                        Firstname:<br>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter Your Firstname..." style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>
                        Lastname:<br>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Your Lastname..." style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>
                        Email:<br>
                        <!-- <h4>please check your email to make sure it's correct.</h4> -->
                        <input type="text" name="email" id="email" placeholder="Enter Your Email..." style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>
                       username:<br>
                        <input type="text" name="user_name" id="user_name" placeholder="Enter Your username..." style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>
                        
                        Password:<br>
                        <input type="text" name="password" id="password" placeholder="Enter Your Password..." style=" height: 1.6rem; width: 20rem; border-top-left-radius: 10px; border-bottom-right-radius: 10px; border: 3px solid cornflowerblue;  padding: 5px"><br>
                       
                   <br> <p>
                       <form method="POST" action="registration_form.php">
   

                      <div><input type="submit" name="register" value="register" style="background-color: rgb(119, 117, 115); height: 3rem; width: 15rem; border-radius: 7px;  "><b></b></button></p></div>
                      </form> <div style="font-size:25px;color:black; "> Already have account<a href="login.php"> LOGIN </a></div></form>
</div>
                   </div> </center> 

        <div class="part0">
            <h2><span>Rwanda,Kigali,kacyiru</span></h2>
            <h2><span>phoneNumber:+250781121528</span></h2>
            <h2><span>Email: reserveforce4@gmail.com</span></h2>
        </div>
        <h2><div class="partcopy"> CopyRight &copy2023 , Developed By PROGRAMMER <b>MULISA</b></h2></div>
    </div>
       </center>
       
       <script>
        const welcomeMessage = document.getElementById("welcomeMessage");
        setTimeout(() => {
                welcomeMessage.style.display = "none";
            }, 2000);
      </script>
</body>
</html>


 