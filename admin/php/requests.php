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
  $result = get_requests();
  echo "<table class='gtable'>
  <thead>
<tr>
<th>ID</th>
<th> Costumer Name</th>
<th>Email</th>
<th>Phone</th>
<th>Reqest</th>
<th>Bid</th>
<th>Shipping Address</th>
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
    echo "<td>" . $row['request'] . "</td>";
    echo "<td>" . $row['bid'] . "</td>";
    echo "<td>" . $row['shippingaddress'] . "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
  ?>