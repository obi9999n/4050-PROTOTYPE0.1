<?php 
$email = trim($_GET['email']);
$name = trim($_GET['name']);
// $oNumber = rand(1000,9999);
// order number should be generated in checkout and passed to this file as url param
$body = "Thanks for placing an order with ATL Bookstore, $name. Your order number is $oNumber.";
mail($email,"Order Confirmation", $body);
?>
<head>
	<link rel="stylesheet" href="css/account.css">
	<title>Confirm</title>
	<center>
		<h2>Check your email for order confirmation</h2>
	</center>
</head>
<body>
	<center>
		<a href="success.php?code=<?php echo $oNumber ?>">Click here to go to order confirmation page</a>
		<!-- change to post as hidden url param -->
	</center>
</body>