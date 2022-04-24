<?php 
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
$orderNum = $_GET['orderNum'];
$user = $_GET['username'];
$total = floatval($_GET['total']);
$address = $_GET['address'];
$name = $_GET['firstname'];
$email = $_GET['email'];
$deadline=Date('m/d/y', strtotime('+5 days'));

$noBlanks = true;
foreach($_GET as $key => $value) {
	if ($value != 0 && empty($value)){
		$noBlanks = false;
		break;
	}
}	
if ($noBlanks == false) {
		echo '<script>alert("No blank input allowed")</script>';
		echo "<script type='text/javascript'>document.location.href='checkoutForm.php';</script>";
}

$insertQuery = "INSERT INTO orders(orderNumber, user_name, total, in_store, fulfilled, address, datePlaced) VALUES ($orderNum, '$user', $total, 0, 0, '$address', CURRENT_TIMESTAMP)";
$insert = mysqli_query($con, $insertQuery);	


$body = "Hello $name. Thank you for placing an order with Atlanta Bookstore. Your order number is #$orderNum.\rYour total is $$total.\rIf you selected in-store pickup, you must pick up your ordeer by $deadline.";
mail($email,"Order Confirmation", $body);
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
		<a href="success.php?orderNum=<?php echo $orderNum ?>&total=<?php echo $total ?>">Click here to go to order confirmation page</a>
	</center>
</body>