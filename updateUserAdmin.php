<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$type = check_if_admin($con);
	$id = $_GET['id'];
    $queryID = "SELECT productID FROM products WHERE categoryID = 2 AND productID = '$id'";
	$queryTitle = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
	$productArray = mysqli_query($con, $queryID);
	$productID = mysqli_fetch_row($productArray)[0];
	$productArray2 = mysqli_query($con, $queryTitle);
	$productTitle = mysqli_fetch_row($productArray2)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Update item</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Updating <?php echo $productTitle ?></h1>
	</center>
</head>

<body>
	<center>
		<form action="updateQuery.php" method="GET">
			<div style="display:inline-block">
				<label for="title">title</label><br>
				<input type="text" name="productName">
			</div>
			<div style="display:inline-block">
				<label for="author">title</label><br>
				<input type="text" name="author">
			</div>
			<div style="display:inline-block">
				<label for="genre">title</label><br>
				<input type="text" name="genre" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="stock">title</label><br>
				<input type="text" name="stock" style="width:75px">
			</div>
			<div style="display:inline-block">
				<label for="ISBN">title</label><br>
				<input type="text" name="ISBN" style="width:125px">
			</div>
			<div style="display:inline-block">
				<label for="productCode">title</label><br>
				<input type="text" name="productCode" style="width:75px">
			</div>
			<div style="display:inline-block">
				<label for="listPrice">title</label><br>
				<input type="text" name="listPrice" style="width:75px">
			</div>
			<div style="display:inline-block">
				<label for="imagePath">title</label><br>
				<input type="text" name="imagePath" style="width:275px">
			</div>
			<!-- <div style="display:inline-block"> -->
			<input type="submit" value="save changes"></button>
			<!-- </div> -->

		</form>


	</center>
</body>
<script>
	var inputs = ["title", "author", "genre", "stock", "isbn", "type", "price", "img"];

	inputs.forEach(update);

	function update(element, index, array) {
		var e = document.getElementById(element);
		// console.log(e)
		if (e.value.trim().length > 0) {
			helper(element);
		} else {
			console.log("empty");
		}
	}

	function helper(element) {
		// var eValue = document.getElementById(element).value;
		switch (element) {
			case "id":
				query("productID");
				break;
			case "title":
				query("productName");
				break;
			case "author":
				query("author");
				break;
			case "genre":
				query("genre");
				break;
			case "stock":
				query("stock");
				break;
			case "isbn":
				query("ISBN");
				break;
			case "type":
				query("productCode");
				break;
			case "price":
				query("listPrice");
				break;
			case "img":
				query("imagePath");
				break;
			default:
				console.log("unexpected value");
		}
		// switch statement where cases are inputs[] elements and control is element param
		// ex: element = "id"
		// switch (element): ...
		// ... case "id" : PERFORM UPDATE QUERY
	}

	// function query(element) {
	// 	var eValue = document.getElementById(element).value;
	// 	location.href = 'updateSuccess.php?element=' + element + '&eValue=' + eValue; <
	// 	? php

	// 	$queryElement = "UPDATE products SET " ? > element < ? php "=" ? > eValue < ? php " WHERE productID = '$id'";
	// 	$queryElement = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
	// 	print($queryElement);
	// 	// $productArray = mysqli_query($con, $queryID);
	// 	// $productID = mysqli_fetch_row($productArray)[0];
	// 	?
	// 	>
	// }
</script>

</html>