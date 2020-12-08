<?php
require_once "config.php";
include 'header.php';
$message = "";
 if (isset($_POST["submit"])){
    
    $adminname = $_POST["adminname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    create_user($adminname, $email, $pass);
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
    <div class = "box">
    <h2> New user! create your account now.</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
            <div>
                <label>Username</label>
                <input class="field" type="text" name="adminname" ><br>
            
                <label>Email Address </label>
                <input class="field" type="email" name="email" ><br>
            
                <label>Password</label>
                <input class="field" type="Password" name="pass" ><br><br>
               
                <input class="sub-btn" type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>    
</body>
<div>
</div> 
</html>