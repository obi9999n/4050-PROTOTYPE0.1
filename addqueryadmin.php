<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$type = check_if_vendor_and_admin($con);

	$noBlanks = true;
		foreach($_GET as $key => $value) {
			if ($value != 0 && empty($value)){
				$noBlanks = false;
				break;
			}
		}	
		if ($noBlanks == true) {	
			$productCode = $_GET['productCode'];
			$productName = $_GET['productName'];
			$author = $_GET['author'];
			$isbn = $_GET['ISBN'];
			$price = $_GET['listPrice'];
			$stock = $_GET['stock'];
			$genre = $_GET['genre'];
			$isBestSeller = $_GET['isBestSeller'];
			$imagePath = $_GET['imagePath'];
			$description = $_GET['description'];
			$insertQuery = "INSERT INTO products(`categoryID`, `productCode`, `productName`, `author`, `ISBN`, `listPrice`, `stock`, `genre`, `isBestSeller`, `imagePath`, `inCart`, `description`) VALUES (2, '$productCode', '$productName', '$author', $isbn, $price, $stock, '$genre', $isBestSeller, '$imagePath', 0, '$description')";
			$result = mysqli_query($con, $insertQuery);
		} else {
			echo '<script>alert("No blank input allowed")</script>';
			echo "<script type='text/javascript'>document.location.href='additemadmin.php';</script>";
		}
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully updated inventory</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Successfully added new book</h1>
		<p> <a href="admin.php">Admin Controls</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>


</html>