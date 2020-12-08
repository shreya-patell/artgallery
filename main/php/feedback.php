<?php
include "header.php";
include 'config.php';
$feedback = "";
$message ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "galleryDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }


$feedback = $_POST["feedback"];
if (isset($_POST['submit'])) {
	if (empty($feedback)) {
		$message = "Please enter your feedback";
	} else {
		$sql = "INSERT INTO feedback (feedback) value(?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("location:../feedback.php?err=insertingFailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "s", $feedback);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		$message = "thank you for your feedback<br>";
		
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>feedback</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>



<div class="box">
<?php echo $message; ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div style=" float:center;" >
		
			<textarea name="feedback" style="text-align:center;" id="message" required="" placeholder="Write your feedback here" cols="50" rows="20"></textarea></label><br>
			<input class="sub-btn" type="submit" name="submit" value="send">
		</label>
	</form>
</div>
</body>
</html>