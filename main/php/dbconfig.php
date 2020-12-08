<?php 
include 'header.php';
include 'config.php';
if (isset($_POST['createdb'])) {
    create_conn_db();
}
if (isset($_POST['createt'])) {
    create_req_table();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>config</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body id="main">

    <div class="box">
        <h1>When run  for the first time create database and table</h1>

        <form method="post">
        <input class="sub-btn" type="submit" name="createdb" value="Create database " /><br><br><br>
        <input class="sub-btn" type="submit" name="createt" value="create reqest table" />
    </form>
    </div>
                        

    
</body>
</html>