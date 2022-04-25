<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
	$id = $_GET['id'];
	$queryUser = "SELECT * FROM users WHERE user_id = '$id'";
	$deleteQuery = "DELETE FROM `users` WHERE user_id ='$id'";
	$result = mysqli_query($con, $queryUser);
	$result2 = mysqli_query($con, $deleteQuery);
	$title = mysqli_fetch_row($result)[0];
	$delete = mysqli_fetch_row($result)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully updated inventory</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Successfully deleted user</h1>
		<p> <a href="admin.php">Admin Controls</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>


</html>