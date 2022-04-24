<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
    $orderNum = $_GET['orderNum'];
    $total = $_GET['total'];
    // from checkout page, send orderNumber as url param to this page
    // retrieve from _GET array
    
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully placed order</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Your order #<?php echo $orderNum ?> has been placed </h1>
		<p>Your total: $<?php echo $total ?>  </p>		
		<p> <a href="home.php">Click here to return to home.</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>

</html>