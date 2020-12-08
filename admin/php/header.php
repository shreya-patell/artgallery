<?php
// Initialize the session

session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/main.css">
</head> 

</head>
<body>
<nav class="navbar">
	<div>
        <a  class="logo" href="home.php"><img src="../img/logo.png" alt="pages logo" width="26" height="26"></a>
			<ul> 
				<li><a href="home.php">Home</a></li> 
				<li><a href="customer.php">Customers</a></li>
				<li><a href="inv.php">Inventory</a></li>
        <li><a href="requests.php">Requests</a></li>
        <li class="user"> Hello <?php echo htmlspecialchars($_SESSION["adminname"]); ?></li>
        
        <li><?php
        if (isset($_SESSION['loggedin'])) {
          echo '<a  class="user" href="logout.php">Log Out</a>';
        } else {
          echo '<a href="login.php">Log in</a>';
        }
        ?></li>
        
			</ul>
     
      
	</div>
</nav>


</body>
</html>