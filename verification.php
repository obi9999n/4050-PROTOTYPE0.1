<?php 
// get email from _POST and store to var
// 
$email = trim($_POST['email']);
$name = $_POST['first_name'];
$code = rand(1000,9999);
$body = "Hello $name. Your verification code is $code";
mail($email,"Registration Confirmation", $body);
// header("Location: regConfirmation.php");
// die();
?>
<head>
	<link rel="stylesheet" href="css/account.css">
	<title>Confirm registration</title>
	<center>
		<h1>Please enter verification code to complete registration</h1>
	</center>
</head>
<body>
	<center>
		<a href="regConfirmation.php?code=<?php echo $code ?>">Click here to go to confirmation page</a>
		<!-- change to post as hidden url param -->
	</center>
</body>