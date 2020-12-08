<?php
include 'header.php';
?>
<html>

<head>
    <link href="../css/main.css" rel="stylesheet">

</head>

<body>

    <?php
    include 'config.php';
    $result = get_artist();
    echo "
    <table class='gtable'>
    <thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>painting</th>
<th>Category</th>
<th>Status</th>
<th>Sold Date</th>
<th>Customer</th>
</tr><tbody>";
    //artistname, painting, category, available
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['artistname'] . "</td>";
        echo "<td>" . $row['painting'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        if ($row['available'] == "1") {
            echo "<td> Available </td>";
        } else {
            echo "<td> Sold </td>";
        }
        echo "<td>" . $row['solddate'] . "</td>";
        echo "<td>" . $row['customername'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
    <div>
        <div class="row">
            <div class="col">
            <br><br><a class="button" href="search-pianting.php" role="button" aria-pressed="true">Modify</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <br><br><a class="button" href="add-inv.php" aria-pressed="true">Add painting</a>
            </div>
        </div>
    </div>


</body>

</html>