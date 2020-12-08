<?php
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: home.php");
    exit;
}
include 'config.php';
//error message variable
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
            header("location: home.php");
        }
    }

    if (isset($_POST['create'])) {
        create_conn_db_tables();
    }
    if (isset($_POST['delete'])) {
        drop_db();
    }
    if (isset($_POST['insert'])) {
        insert_values();
    }
}
?>

<head>
    <link href="../css/main.css" rel="stylesheet"> 
    <title>login</title> 
</head>

<body>
    <div class ="box">
        <div>
        <locale_get_display_name>
            <form  action="" method="post">
                <h1 >Welcome to HAST </h1>
                <h3>Please Login</h3>
                <label  for="email">Email:</label><br>
                <input class="field" type="email" name="email" id="username" required><br>
                                    
                                    
                <label for="password" >Password:</label><br>
                <input class="field" type="password" name="pass" id="password" required><br>
                                    
                                    
                <input class="button" type="submit" name="submit" value="submit">
            </form>
        </div>
            <div>
                <p><?php echo $message ?></p>
            </div>
            <div>
                <h3>When run for the first time</h3>
                <ul>
                    <li>Delete existed galleryDB</li>
                    <li>Create galleryDB</li>
                    <li>Insert test values</li>
                    <li>login using the folloing credentials
                        <ol>
                            <li>
                                test@test.com/test123
                            </li>
                            <li>
                                hast@test.com/hast123
                            </li>
                        </ol>               
                    </li>
                </ul>
            </div>
            <div>
            <form method="post">
                <input class="button" type="submit" name="create" value="Create DB & tables" />
                <input class="button" type="submit" name="insert" value="insert random records" />
                <input class="button" type="submit" name="delete" value="Delete DB" />
            </form>
            </div>
    </div>
</body>