<?php
// Initialize the session

session_start();


?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/main.css">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head> 
<nav class="navbar">
		<div>
        <a  class="logo" href="hastgallery.php"><img src="../img/logo.png" alt="pages logo" width="26" height="26"></a>
			<ul> 
				<li><a href="hastgallery.php">Home</a></li> 
                <li><a href="dbconfig.php">database</a></li>
				<li><a href="store.php">Store</a></li>
				<li><a href="signup.php">Signup</a></li>
				<li><?php
        if (isset($_SESSION['loggedin'])) {
			
			$Color = "skyblue";
			$user = htmlspecialchars($_SESSION["adminname"]);
			echo   '<li style="Color:'.$Color.'">'."Hello".' '.$user.'</li>';
          	echo '<a href="logout.php">Log Out</a>';
        } else {
          	echo '<a href="login.php">Log in</a>';
        }
        ?></li>
		
			</ul>
		
		</div>
	</nav>
</head>
<body>

</body>
</html>