<?php
////////////////////////////////////////////////////
function create_conn_db_tables()
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

    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "CREATE TABLE artist(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        artistname VARCHAR(50) NOT NULL,
        painting VARCHAR(50) NOT NULL,
        solddate DATE,
        category VARCHAR(50),
        customername VARCHAR(50),
        available BOOLEAN)";
    mysqli_query($conn, $sql);

    $sql = "CREATE TABLE Customer(
            id INT(6) AUTO_INCREMENT PRIMARY KEY,
            custname VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL,
            custaddress VARCHAR(50),
            phone VARCHAR(50))";
    mysqli_query($conn, $sql);

    $sql = "CREATE TABLE Users(
            id INT(6) AUTO_INCREMENT PRIMARY KEY,
            adminname VARCHAR(50),
            email VARCHAR(50),
            pass VARCHAR(255))";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
////////////////////////////////////////////////////////////////
function drop_db()
{
    $dbname = "galleryDB";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "DROP DATABASE {$dbname}";
    if (mysqli_query($conn, $sql)) {
        echo "Database {$dbname} was successfully dropped\n";
    } else {
        echo 'Error dropping database: ' . mysqli_error($conn) . "\n";
    }
}
////////////////////////////////////////////////////////////////////////
function insert_values()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    //insert values in artist table
    $sql = "INSERT INTO artist (artistname, painting, category, available) VALUES ('Andy Warhol','INGENIUM', 'nature ', '1');";
    $sql .= "INSERT INTO artist (artistname, painting, category, available) VALUES ('Vincent van Gogh','The Starry Night', 'nature', '1');";
    $sql .= "INSERT INTO artist (artistname, painting, category, available) VALUES ('unknown','golden', 'photography', '1');";
    $sql .= "INSERT INTO artist (artistname, painting, category, available) VALUES ('someone cool','PRECIS', 'abstract', '1');";
    $sql .= "INSERT INTO artist (artistname, painting, category, available, solddate, customername) VALUES ('Klimt','The Kiss', 'oil-on-canvas', '0', '2019-01-05', 'Ammar');";
    //insert values in customer table
    $sql .= "INSERT INTO Customer (custname, email, phone, custaddress) VALUES ('Ammar','ammar@example.com', '92387654', 'Oshawa');";
    $sql .= "INSERT INTO Customer (custname, email, phone, custaddress) VALUES ('Hima','hima@example.com', '63782123', 'Toronto');";
    $sql .= "INSERT INTO Customer (custname, email, phone, custaddress) VALUES ('Shreya','shreya@example.com', '76554645', 'North York');";
    $sql .= "INSERT INTO Customer (custname, email, phone, custaddress) VALUES ('Fayomz','fayomz@example.com', '65424365', 'Oshawa');";
    //insert 2 users with password hash
    $pass1 = 'test123';
    $hash1 = password_hash($pass1, PASSWORD_DEFAULT);
    $pass2 = 'hast123';
    $hash2 = password_hash($pass2, PASSWORD_DEFAULT);

    $sql  .= "INSERT INTO Users (adminname, email, pass) VALUES ('test', 'test@test.com', '$hash1');";
    $sql .= "INSERT INTO Users (adminname, email, pass) VALUES ('hast','hast@test.com','$hash2');";
    mysqli_query($conn, $sql);

    if ($conn->multi_query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
/////////////////////////////////////////////////////////////////////////
function get_customers()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Customer";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_query($conn, $sql)) {
        echo "Error\n";
    }
    return $result;
}
///////////////////////////////////////////////////////////////////////
function get_artist()
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
//////////////////////////////////////////////////////////////
function get_available_artist()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM artist WHERE available = '1';";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_query($conn, $sql)) {
        echo "Error\n";
    }
    return $result;
}
//////////////////////////////////////////////////////////////
function add_customer($name, $email, $address, $phone)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "INSERT INTO Customer (custname, email, custaddress, phone) VALUES ('$name','$email', '$address', '$phone')";
    if ($conn->multi_query($sql) === TRUE) {
        return 1;
    } else {
        return 0;
        //  echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
//////////////////////////////////////////////////////////////////////
function get_requests()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "SELECT * FROM requests";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_query($conn, $sql)) {
        echo "Error\n";
    }
    return $result;
}
//////////////////////////////////////////////////////////////////////
function add_artist($name, $painting, $category, $available)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $sql = "INSERT INTO artist (artistname, painting, category, available) VALUES ('$name','$painting', '$category', '$available')";
    if ($conn->multi_query($sql) === TRUE) {
        return 1;
    } else {
        return 0;
          echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
///////////////////////////////////////////////////////////////////////
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


