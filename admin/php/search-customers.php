<?php
include 'header.php';
?>
<?php
$id = "";
$custname = "";
$email = "";
$custaddress = "";
$phone = "";
$message = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    $id = $_POST["id"];
    $custname = $_POST["custname"];
    $email = $_POST["email"];
    $custaddress = $_POST["custaddress"];
    $phone = $_POST["phone"];

    if (isset($_POST['btnupdate'])) {
        if (empty($custname) or empty($email) or empty($custaddress) or empty($phone)) {
            $message = "Please fill out the required fields<br>";
        } else {
            $sql = "UPDATE Customer SET custname='$custname', email='$email', custaddress='$custaddress', phone='$phone' WHERE id='$id'";
            mysqli_query($conn, $sql);
            $message = "Customer Record Updated Successfully<br>";
        }


        $id = $custname = $email = $custaddress = $phone = "";
    } else if (isset($_POST['btndelete'])) {
        if (empty($custname) or empty($email) or empty($custaddress) or empty($phone)) {
            $message = "Please search for a customer first<br>";
        } else {
            $sql = "DELETE FROM Customer where id='$id'";
            mysqli_query($conn, $sql);
            $message = "Customer Record Deleted Successfully";
        }

        $id = $custname = $email = $custaddress = $phone = "";
    } else if (isset($_POST['btnsearch'])) {
        if (empty($id) and empty($custname)) {
            $message = "Please search for a customer by ID of Name";
        } else {
            $sql = "SELECT custname, email, custaddress, phone from Customer where id LIKE '$id%' AND custname LIKE '$custname%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $custname = $row["custname"];
                $email = $row["email"];
                $custaddress = $row["custaddress"];
                $phone = $row["phone"];
            } else {
                $message = "No results";
            }
        }
    } else if (isset($_POST['reset'])) {
        header("Refresh:0");
    }
    mysqli_close($conn);
}

?>
<html>

<head>
    <link href="../css/main.css" rel="stylesheet">
</head>

<body>
    <div class="box">
    <?php echo $message; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div >
                <label for="name">ID</label>
                <input class="field" type="text" name="id" value="<?php echo $id; ?>">
            </div>

            <div >
                <label for="name">Customer Name</label>
                <input class="field" type="text" name="custname"  value="<?php echo $custname; ?>">
            </div>

            <div >
                <label for="name">Email</label>
                <input class="field" type="email" name="email"  value="<?php echo $email; ?>">
            </div>

            <div >
                <label for="name">Address</label>
                <input class="field" type="text" name="custaddress"  value="<?php echo $custaddress; ?>">
            </div>

            <div >
                <label for="name">Phone</label>
                <input class="field" type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div>
                
                <input class="button" type="submit"  name="btnsearch" value="Search" />
                <input class="button" type="submit"  name="btnupdate" value="Update" />
                <input class="button" type="submit"  name="btndelete" value="Delete" />
                <input class="button" type="submit"  name="reset" value="Clear" />
                <a class="button" type="submit"  href="customer.php">Back To Customers</a>
            </div>
        </form>
        <div>
        <br><b>Note: You can search for a customer either by ID or Customer Name</b>
        </div>
    </div>
</body>

</html>