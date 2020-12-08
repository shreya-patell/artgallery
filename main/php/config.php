<?php 
function create_conn_db()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
  // Create database
  $sql = "CREATE DATABASE galleryDB";
  if (mysqli_query($conn, $sql)) {
      echo "Database created successfully";
  } else {
      echo "Error creating database: " . mysqli_error($conn);
  }
}
function create_req_table()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "CREATE TABLE requests(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        custname VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(50),
        request VARCHAR(50),
        bid VARCHAR(50),
        shippingaddress VARCHAR(50))";
    if (mysqli_query($conn, $sql)) {
        echo "Table created successfully";
    } else {
        echo "err creating table:E " . mysqli_error($conn);
    }
    $sql = "CREATE TABLE feedback(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        feedback VARCHAR(255))";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
/////////////////////////////////////
function auth($email, $pass)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Users WHERE email = '$email';";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hash = $row["pass"];
        if (password_verify($pass, $hash)) {
            return $row["adminname"]; //success return adminname
        } else {
            return "0"; //wrong password
        }
    } else {
        return "notfound";
    }
}
//////////////////////////////////////////////////////
function create_user($adminname, $email, $pass){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (adminname, email, pass) value(?, ?, ? );";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../reg.php?err=insertingFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $adminname, $email, $hash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: hastgallery.php");
    exit();
    
}
///////////////////////////////////////////////////////////////
function get_painting()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM artist";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_query($conn, $sql)) {
        echo "Error\n";
    }
    return $result;
}

