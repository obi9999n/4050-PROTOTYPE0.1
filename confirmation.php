<?php 
$orderNum = $_GET['orderNum'];
// GET ALL INFO FROM CHECKOUT FORM AND PERFORM QUERY ON ORDERS TABLE
?>
<head>
	<link rel="stylesheet" href="css/account.css">
	<title>Confirmation</title>
	<center>
		<h2>Check your email for order confirmation</h2>
	</center>
</head>
<body>
	<center>
		<a href="success.php?orderNum=<?php echo $orderNum ?>">Click here to go to order confirmation page</a>
	</center>
</body>