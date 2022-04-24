<?php 
// get email from _POST and store to var
// 
$email = trim($_GET['email']);
$user = trim($_GET['username']);
$name = trim($_GET['name']);
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
		<h2>Check your email for verification code</h2>
	</center>
</head>
<body>
	<center>
		<a href="regConfirmation.php?code=<?php echo $code ?>&username=<?php echo $user ?>">Click here to go to confirmation page</a>
		<!-- change to post as hidden url param -->
	</center>
</body>