<?php
include 'header.php';
include 'config.php';
$artresult = get_available_artist();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnadd'])) {
        $name = $_POST["artistname"];
        $painting = $_POST["painting"];
        $category = $_POST["category"];
        $available = "1";
        $result = add_artist($name, $painting, $category, $available);
        if ($result == 1) {
            header("Location: inv.php");
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
            <div >
                <label for="name">Name</label>
                <input class="field" type="text" name="artistname" placeholder="Enter Name" required>
            </div>

            <div >
                <label for="name">painting</label>
                <input class="field" type="text" name="painting"  placeholder="Enter painting" required>
            </div>

            <div>
                <label for="name">Category</label>
                <input class="field" type="text" name="category"  placeholder="Enter Category" required>
            </div>

            <div>
                <label for="name">Status(Readonly)</label>
                <input class="field" type="text" name="available" placeholder="Available" readonly>
            </div>
            <div>
                
                <input class="button" type="submit" name="btnadd" value="Add" />
                <a class="button" type="submit" name="add" href="inv.php">Back To Inverntory</a>
            </div>
        </form>
    </div>
</body>
</html>