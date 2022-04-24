<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
	
?>

<!doctype HTML>
<html lang="english">

<head>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Vendor Controls</h1>
	</center>
</head>

<body>
	<center>
		<p>Welcome vendor!</p><br>
		<div class='container' style='display:flex'>
			<div id="box">
				<center><b>Reports</b></center>
				<center><a href=salesReport.php>End of day sales report</a></center>
				<center><a href=orderReport.php>Orders report</a></center>
				<center><a href=invReport.php> Inventory report</a></center>
			</div>
			<div id="box">
		<a href="manageInventory.php"> <b>View/Manage inventory</b></a>
			</div>
			<div id="box">
				<a href="manageOrders.php"> <b>View/Manage orders</b></a>
			</div>
		</div>
		<a href="account.php">Return to settings</a>
	</center>

</body>

</html>