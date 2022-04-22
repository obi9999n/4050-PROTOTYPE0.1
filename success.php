<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
    // from checkout page, send orderNumber as url param to this page
    // retrieve from _GET array
    
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully placed order</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<!-- <h1>Your order <?php echo $oNumber ?> has been placed </h1> -->
		<h1>Your order #12345 has been placed </h1>
		<p> <a href="home.php">Click here to return to home.</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>

</html>