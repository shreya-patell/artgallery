<?php
include 'header.php';
include 'config.php';
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $result = auth($email, $pass);

        if ($result == "notfound") {
            $message = "email not found";
        } elseif ($result == "0") {
            $message = "wrong password";
        } else {
            // Password is correct, so start a new session
            session_start();
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["adminname"] = $result;
            $_SESSION["email"] = $email;

            // Redirect user to Home page
            header("location: hastgallery.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="../css/main.css">
</head>
<body id="main">
<div class ="box">
        <div>
        <locale_get_display_name>
            <form  action="" method="post">
                <h1 >Welcome to HAST </h1>
                <h3>Please Login</h3>
                <label  for="email">Email:</label><br>
                <input class="field" type="email" name="email" id="username" required><br>
                                    
                                    
                <label for="password" >Password:</label><br>
                <input class="field" type="password" name="pass" id="password" required><br><br>
                                    
                                    
                <input class="sub-btn" type="submit" name="submit" value="submit">
            </form>
        </div>
            <div>
                <p><?php echo $message ?></p>
            </div>
        </form>
</div>
    </div>  
</body>
<div>

</div> 
</html>