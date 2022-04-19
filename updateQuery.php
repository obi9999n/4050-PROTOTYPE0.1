<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
	$id = $_GET['productID'];
	$queryTitle = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
	$result = mysqli_query($con, $queryTitle);
	$title = mysqli_fetch_row($result)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully updated inventory</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Successfully updated <?php echo $title ?></h1>
		<?php 	
		foreach($_GET as $key => $value) {
			if ($key == "productID") {
				continue;
			} else if(isset($_GET[$key])) {
				if ($value == 0) {
					$queryElement = "UPDATE products SET $key=$value WHERE categoryID = 2 AND productID = $id";
					$update = mysqli_query($con, $queryElement);	
				
				} else if (!empty($_GET[$key])){
					$queryElement3 = "UPDATE products SET $key='$value' WHERE categoryID = 2 AND productID = $id";
					$update3 = mysqli_query($con, $queryElement3);	

				}
			}
		}	
		?>
		<p> <a href="manageInventory.php">Click here to go back to manage inventory page.</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>


</html>