<?php
include 'header.php';
include 'config.php';
$artresult = get_available_artist();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnadd'])) {
        $name = $_POST["custname"];
        $email = $_POST["email"];
        $address = $_POST["custaddress"];
        $phone = $_POST["phone"];
        $result = add_customer($name, $email, $address, $phone,);
        if ($result == 1) {
            header("Location: customer.php");
        } else {
        }
    }
}

?>
<html>

<head>
    <head>
        <link href="../css/main.css" rel="stylesheet">
    </head>
</head>

<body>
<div class="box">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label for="name">Customer Name</label>
                <input class="field" type="text" name="custname" placeholder="Enter Name" required>
            </div>

            <div>
                <label for="name">Email</label>
                <input class="field" type="email" name="email" placeholder="Enter Email" required>
            </div>

            <div>
                <label for="name">Address</label>
                <input class="field" type="text" name="custaddress" placeholder="Enter Address" required>
            </div>

            <div >
                <label for="name">Phone</label>
                <input class="field" type="text" name="phone" placeholder="Enter Phone" required>
            </div>
            <div>
                <input class="button" type="submit" name="btnadd" value="Add" /><br><br>
                <a class="button" type="submit" href="customer.php">Back To Customers list</a>
                
            </div>
        </form>
    </div>
</body>
</html>