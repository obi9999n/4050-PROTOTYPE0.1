<?php
session_start();

	include("connection.php");
	include("functions.php");
	$code = $_GET['code'];
	$user = $_GET['username'];
	
//     $user_data = check_login($con);
//   $orders = query on orders table and return number of rows where dateplaced is today
//	$totalSales = query on orders table and return sum of all totals where date placed is today
?>

<!doctype HTML>
<html lang="english">

<head>
	<link rel="stylesheet" href="css/account.css">
	<title>Confirm registration</title>
	<center>
		<h1>Enter verification code to complete registration</h1>
	</center>
</head>

<body>
	<div id="box">
		<center>
			<label for="code">Verification code</label>
			<input type="text" id="code">
			<input type="submit" onclick="validate()">
		</center>
	</div>
</body>

</html>
<script>
	function validate() {
		const queryString = window.location.search;
		const urlParams = new URLSearchParams(queryString);
		const validCode = urlParams.get('code');
		const input = document.getElementById("code").value;
		if (validCode == input) {
			alert("Correct! Redirecting to login page.");
			<?php 
				$queryUpdate = "UPDATE users SET verified=1 WHERE user_name = '$user'";
				$update = mysqli_query($con, $queryUpdate);	
			?>
			location.assign('login.php');
		} else {
			alert("Wrong code! Try again.");
		}
	}

</script>
