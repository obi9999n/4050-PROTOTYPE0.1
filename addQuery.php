<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);

	$noBlanks = true;
		foreach($_GET as $key => $value) {
			// if(isset($_GET[$key])) {
				// if ($value == 0) {
				// 	$queryElement = "UPDATE products SET $key=$value WHERE categoryID = 2 AND productID = $id";
				// 	$update = mysqli_query($con, $queryElement);	
				// }
			if ($value != 0 && empty($value)){
				// echo $value;
				$noBlanks = false;
				break;
			}
		}	
		if ($noBlanks == true) {	
			// echo "no blanks found";
			$productCode = $_GET['productCode'];
			$productName = $_GET['productName'];
			$author = $_GET['author'];
			$isbn = $_GET['ISBN'];
			$price = $_GET['listPrice'];
			$stock = $_GET['stock'];
			$genre = $_GET['genre'];
			$isBestSeller = $_GET['isBestSeller'];
			$imagePath = $_GET['imagePath'];
			$prevIDQuery = "SELECT MAX('productID') FROM products";
			$result = intval(mysqli_query($con, $prevIDQuery));
			$result++;
			$resetIDQuery = "ALTER TABLE 'products' AUTO_INCREMENT = $result";
			$result2 = mysqli_query($con, $resetIDQuery);
			// $newID = intval($result);
			$insertQuery = "INSERT INTO products(`categoryID`, `productCode`, `productName`, `author`, `ISBN`, `listPrice`, `stock`, `genre`, `isBestSeller`, `imagePath`, `inCart`) VALUES (2, '$productCode', '$productName', '$author', $isbn, $price, $stock, '$genre', $isBestSeller, '$imagePath', 0)";
			$result3 = mysqli_query($con, $insertQuery);
		} else {
			echo '<script>alert("No blank input allowed")</script>';
			echo "<script type='text/javascript'>document.location.href='addItem.php';</script>";
		}
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully updated inventory</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Successfully added new book</h1>
		<p> <a href="manageInventory.php">Click here to go back to manage inventory page.</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>


</html>