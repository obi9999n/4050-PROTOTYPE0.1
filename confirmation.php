<?php 
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
$orderNum = $_GET['orderNum'];
$user = $_GET['username'];
$total = floatval($_GET['total']);
// $shippingType = intval($_GET['shipping']);
$address = $_GET['address'];
// if (isset($orderNum) && isset($user) && isset($total) && isset($address)) {
// 	echo "all are set";
// } else {
// 	echo "nah";
// }


// foreach($_GET as $key => $value) {
	// if ($key == "orderNum") {
	// 	continue;
	// } else if(isset($_GET[$key])) {
	// 	if ($value == 0) {

$insertQuery = "INSERT INTO orders(orderNumber, user_name, total, in_store, fulfilled, shipping, address, datePlaced) VALUES ($orderNum, '$user', 9.99, 0, 0, 0, '$address', CURRENT_TIMESTAMP)";
$insert = mysqli_query($con, $insertQuery);	


// $body = "Hello $name. Your verification code is $code";
// mail($email,"Order Confirmation", $body);


// echo mysqli_error($con);
		
		// } else if (!empty($_GET[$key])){
// $insertQuery = "INSERT INTO orders('orderNumber', 'user_name', 'total', 'in-store', 'fulfilled', 'shipping', 'address') VALUES ('$orderNum', '$user', '$total', 0, 0,0 , '$address')";
// $update = mysqli_query($con, $insertQuery);	

	// 	}
	// } else if (!isset($_GET[$key])) {
// echo '<script>alert("No blanks allowed")</script>';
// echo "<script type='text/javascript'>document.location.href='checkoutForm.php';</script>";
	// }
// }	
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
		<a href="success.php?orderNum=<?php echo $orderNum ?>&total=<?php echo $total ?>">Click here to go to order confirmation page</a>
	</center>
</body>