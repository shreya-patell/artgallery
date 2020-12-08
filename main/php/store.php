
<?php
include 'header.php';
include 'config.php';
$message = "";
$custname = "";
$email = "";
$bid = "";
$shippingaddress = "";
$request="";
$paintings = get_painting();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    $custname = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["cell"];
    $shippingaddress = $_POST["ship"];
    $request = $_POST["request"];
    $bid = $_POST["bid"];
    

    if (isset($_POST['btnsubmit'])) {
        if (empty($custname) or empty($email) or empty($phone) or empty($shippingaddress)) {
            $message = "Please fill empty fields";
        } else {
            $sql = "INSERT INTO requests (custname, email, phone, request, bid, shippingaddress) value(?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("location:../store.php?err=insertingFailed");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "ssssss", $custname, $email, $phone, $request,$bid, $shippingaddress);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            $message = "your order has been placed<br>";
            
        }
}
}
?>

<html>

<head>
    
    <link href="../css/main.css" rel="stylesheet">
</head>

<body id="main">

    <div class="box">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Name</label>
                <input class="field" type="text" name="name" >
            </div>

            <div>
                <label >Email address</label>
                <input class="field" type="email" name="email"  >
            </div>

            

            <div>
                <label>Shipping address</label>
                <input class="field" type="text" name="ship"  >
            </div>

            <div>
                <label>Phone number</label>
                <input class="field" type="text" name="cell"  >
            </div>
            <div>
                <label>Bid</label>
                <input class="field" type="text" name="bid"  >
            </div>

            <div>
                <div>
                <br><select class="field" name="request">
                        <?php foreach ($paintings as $painting) : ?>
                            <option value='<?= $painting['painting']; ?>'><?= $painting['painting']; ?></option>
                        <?php endforeach; ?>
               
                    </select>
                </div>

            </div>

            <div>
                <br><input class="sub-btn" type="submit"  name="btnsubmit" value="place my order" />
            </div>
        </form>
        <div class="alert-danger" role="alert">
            <?php echo $message; ?>
        </div>
    </div>
</body>

</html>
