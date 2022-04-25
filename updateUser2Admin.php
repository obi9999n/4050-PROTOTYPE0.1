<?php
	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
	$id = $_GET['id'];
	$oNum = $_GET['oNum'];
	$queryUser = "SELECT * FROM users WHERE user_id = '$id'";
	$results = mysqli_query($con, $queryUser);
	$name = mysqli_fetch_row($results)[9];
	// $queryTitle = "SELECT productName FROM products WHERE categoryID = 2 AND productID = '$id'";
	// $result = mysqli_query($con, $queryTitle);
	// $title = mysqli_fetch_row($result)[0];
?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Successfully updated account</title>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Successfully updated <?php echo $name ?></h1>
		<?php 	
		foreach($_GET as $key => $value) {
			if ($key == "id") {
				continue;
			} else if(isset($_GET[$key])) {
				if ($value == 0) {
					$queryElement = "UPDATE users SET $key=$value WHERE user_id = $id";
					$update = mysqli_query($con, $queryElement);	
				
				} else if (!empty($_GET[$key])){
					$queryElement3 = "UPDATE users SET $key='$value' WHERE user_id = $id";
					$update3 = mysqli_query($con, $queryElement3);	

				}
			}
		}	
		?>
		<p> <a href="admin.php">Admin Control</a></p>
	</center>
</head>

<body>
	<center>

	</center>
</body>


</html>