<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$type = check_if_vendor_and_admin($con);
	// $id = $_GET['id'];
	// $queryTitle = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
	// $result = mysqli_query($con, $queryID);
	// $productID = mysqli_fetch_row($result)[0];
	// $result2 = mysqli_query($con, $queryTitle);
	// $title = mysqli_fetch_row($result2)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Add new user</title>
	<link rel="stylesheet" href="css/account.css">
	<button onclick="location.href='admin.php'" style="margin: 15px;">Admin Controls</button>
	<center>
		<h1>Add item </h1>
	</center>
</head>

<body>
	<center>
		<form action="addqueryuseradmin.php" method="GET">
			<div style="display:inline-block">
				<label for="title">User ID</label><br>
				<input type="text" name="user_id">
			</div>
			<div style="display:inline-block">
				<label for="author">Username</label><br>
				<input type="text" name="user_name">
			</div>
			<div style="display:inline-block">
				<label for="genre">Password</label><br>
				<input type="text" name="password" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="stock">Date Registered</label><br>
				<input type="text" name="date" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="ISBN">User Type</label><br>
				<input type="text" name="user_type" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="productCode">Birthday</label><br>
				<input type="text" name="birthday" style="width:125px">
			</div>	
			<input type="submit" value="add user"></input>
		</form>

	</center>
</body>

</html>