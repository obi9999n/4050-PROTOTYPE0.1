<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $orderNum = $_GET['orderNum'];
    $total = $_GET['total'];
    // from checkout page, send orderNumber as url param to this page
    // retrieve from _GET array
	
	$query = "DELETE FROM cart";
	mysqli_query($con, $query);
	$queryProducts = "UPDATE products SET inCart = '0' WHERE inCart != '0'";
    mysqli_query($con, $queryProducts);
    
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully placed order</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Your order #<?php echo $orderNum ?> has been placed </h1>
		<p>Your total: $<?php echo $total ?></p>		
		<p> <a href="home.php">Click here to return to home.</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>

</html>