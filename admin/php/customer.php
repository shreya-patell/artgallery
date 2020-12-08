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
  $result = get_customers();
  echo "<table class='gtable'>
  <thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
</thead>
</tr>
<tbody>";
  //custname, email, phone, custaddress, artist
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['custname'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>" . $row['custaddress'] . "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
  ?>
  <div>
        <div >
            <div>
            <br><br><a class="button" href="search-customers.php" role="button" aria-pressed="true">modify</a> 
            </div>
        </div>
        <div >
            <div>
            <br><br><a class="button" href="add-customer.php" role="button" aria-pressed="true">Add Customer</a>
            </div>
        </div>
    </div>

</body>

</html>