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
	<title>Add new item</title>
	<link rel="stylesheet" href="css/account.css">
	<button onclick="location.href='admin.php'" style="margin: 15px;">Admin Controls</button>
	<center>
		<h1>Add item </h1>
	</center>
</head>

<body>
	<center>
		<form action="addqueryadmin.php" method="GET">
			<input type="hidden" name="categoryID" value=2>

			<div style="display:inline-block">
				<label for="title">title</label><br>
				<input type="text" name="productName">
			</div>
			<div style="display:inline-block">
				<label for="author">author</label><br>
				<input type="text" name="author">
			</div>
			<div style="display:inline-block">
				<label for="genre">genre</label><br>
				<input type="text" name="genre" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="stock">stock</label><br>
				<input type="text" name="stock" style="width:75px">
			</div>
			<div style="display:inline-block">
				<label for="ISBN">isbn</label><br>
				<input type="text" name="ISBN" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="productCode">type</label><br>
				<input type="text" name="productCode" style="width:75px">
			</div>
			<div style="display:inline-block">
				<label for="listPrice">price</label><br>
				<input type="text" name="listPrice" style="width:75px">
			</div>
			<div style="display:inline-block">
				<label for="listPrice">best seller? (0 or 1)</label><br>
				<input type="text" name="isBestSeller">
			</div>
			<div style="display:inline-block">
				<label for="imagePath">image path (.jpeg) </label><br>
				<input type="text" name="imagePath" style="width:275px">
			</div>
			<div style="display:inline-block">
				<label for="description">Description</label><br>
				<input type="text" name="description" style="width:275px">
			</div>
			<input type="submit" value="add book"></input>
		</form>

	</center>
</body>

</html>