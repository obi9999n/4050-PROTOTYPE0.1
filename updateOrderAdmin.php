<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
	$id = $_GET['id'];
	$oNum = $_GET['oNum'];
//     $queryID = "SELECT productID FROM products WHERE categoryID = 2 AND productID = '$id'";
// 	$queryTitle = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
// 	$result = mysqli_query($con, $queryID);
// 	$productID = mysqli_fetch_row($result)[0];
// 	$result2 = mysqli_query($con, $queryTitle);
// 	$title = mysqli_fetch_row($result2)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Update order</title>
	<link rel="stylesheet" href="css/account.css">
	<button onclick="location.href='admin.php'" style="margin: 15px;">Go back</button>
	<center>
		<h1>Updating #<?php echo $oNum ?></h1>
	</center>
</head>

<body>
	<center>
		<form action="updateQuery2Admin.php" method="GET">
			<input type="hidden" name="id" value=<?php echo $id ?>>
			<input type="hidden" name="oNum" value=<?php echo $oNum ?>>
			<div style="display:inline-block">
				<label for="fulfilled">Fulfilled? (0 or 1)</label><br>
				<input type="text" name="fulfilled" style="width:100px">
			</div>
			<!-- <div style="display:inline-block">
				<label for="adress">Shipping address</label><br>
				<input type="text" name="adress" style="width:125px">
			</div> -->
			<input type="submit" value="save changes">
		</form>
	</center>
</body>

</html>