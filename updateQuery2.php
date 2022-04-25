<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
	$id = $_GET['id'];
	$oNum = $_GET['oNum'];
	// $queryTitle = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
	// $result = mysqli_query($con, $queryTitle);
	// $title = mysqli_fetch_row($result)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully updated inventory</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Successfully updated #<?php echo $oNum ?></h1>
		<?php 	
		foreach($_GET as $key => $value) {
			if ($key == "id") {
				continue;
			} else if(isset($_GET[$key])) {
				if ($value == 0) {
					$queryElement = "UPDATE orders SET $key=$value WHERE id = $id";
					$update = mysqli_query($con, $queryElement);	
				
				} else if (!empty($_GET[$key])){
					$queryElement3 = "UPDATE orders SET $key='$value' WHERE id = $id";
					$update3 = mysqli_query($con, $queryElement3);	

				}
			}
		}	
		?>
		<p> <a href="manageOrders.php">Click here to go back to manage orders page.</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>


</html>