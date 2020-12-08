<?php
include 'header.php';
?>
<?php
include 'config.php';
$id = "";
$artistname = "";
$painting = "";
$category = "";
$available = "";
$solddate = "";
$customername = "";
$message = "";
$cutomerNames = get_customers();

//artistname, painting, category, available
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
    $artistname = $_POST["artistname"];
    $painting = $_POST["painting"];
    $category = $_POST["category"];
    $customername = $_POST["customerselect"];
    $solddate = $_POST["solddate"];
    $available =$_POST["available"];

    if (isset($_POST['btnupdate'])) {
        if (empty($artistname) or empty($painting) or empty($category)) {
            $message = "Please search for a painting first";
        } else {
                if($available =="1")
                {
                    $sql = "UPDATE artist SET artistname='$artistname', painting='$painting', category='$category' WHERE id='$id'";
                }
                else{
                    $sql = "UPDATE artist SET artistname='$artistname', painting='$painting', category='$category', solddate='$solddate' ,customername='$customername', available='0' WHERE id='$id'";
                }
               mysqli_query($conn, $sql);
            $message = "Record Updated Successfully<br>";
        }
        $artistname = $painting = $category = $available = $solddate = $customername = "";
    } else if (isset($_POST['btndelete'])) {
        if (empty($artistname) or empty($painting) or empty($category)) {
            $message = "Please search for a painting first";
        } else {
            $sql = "DELETE FROM artist where id='$id'";
            mysqli_query($conn, $sql);
            $message = "Record Deleted Successfully";
        }

        $artistname = $painting = $category = $available = $solddate  = $customername = "";
    } else if (isset($_POST['btnsearch'])) {
        if (empty($id) and empty($artistname)) {
            $message = "Please search for a painting by ID or Name";
        } else {
            $sql = "SELECT artistname, painting, category, available, solddate, customername from artist where id LIKE '$id%' AND artistname LIKE '$artistname%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $artistname = $row["artistname"];
                $painting = $row["painting"];
                $category = $row["category"];
                $available = $row["available"];
                $solddate = $row["solddate"];
                $customername = $row["customername"];
            } else {
                $message = "No results";
            }
        }
    }  else if (isset($_POST['reset'])) {
        header("Refresh:0");
    }
    mysqli_close($conn);
}

?>
<html>

<head>
    
    
<!--external links for the pop up calander -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link href="../css/main.css" rel="stylesheet">
    <script>
        $(function() {
            $("#solddate").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
            $("#solddate").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true
            });
        });
        $(document).ready(function() {
            $("#soldInfo").hide();
            $('input[type=radio][name=available]').change(function() {
                if (this.value == '1') {
                    $("#soldInfo").hide();
                } else if (this.value == '0') {
                    $("#soldInfo").show();
                }
            });
        });
    </script>

</head>

<body>

    <div class="box">
    <?php echo $message; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>ID</label>
                <input class="field" type="text" name="id" value="<?php echo $id; ?>">
            </div>

            <div >
                <label>artist Name</label>
                <input class="field" type="text" name="artistname" value="<?php echo $artistname; ?>">
            </div>

            <div>
                <label>painting</label>
                <input class="field" type="text" name="painting" value="<?php echo $painting; ?>">
            </div>

            <div>
                <label>Category</label>
                <input class="field" type="text" name="category"  value="<?php echo $category; ?>">
            </div>

            <?php
            if ($available == "0") {
                include 'painting-sold.php';
            }
            else{
                include 'painting-available.php';
            }
            ?>
            <div id="soldInfo">
                <div>
                    <select class="field" name='customerselect' id='cust'>
                        <?php foreach ($cutomerNames as $customername) : ?>
                            <option value='<?= $customername['custname']; ?>'><?= $customername['custname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="name">Sold Date</label>
                    <input class="field" type="text" name="solddate" id="solddate"  value="<?php echo $solddate; ?>">
                </div>
            </div>

            <div>   
                <input type="submit" class="button" name="btnsearch" value="Search" />
                <input type="submit" class="button" name="btnupdate" value="Update" />
                <input type="submit" class="button" name="btndelete" value="Delete" />
                <input type="submit" class="button" name="reset" value="Clear" />
                <a type="submit" class="button" href="inv.php">Back To Inventory</a>
            </div>
        </form>
    </div>
</body>

</html>
