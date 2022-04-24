<?php
	session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
	//   $orders = query on orders table and return number of rows
	//	$totalSales = query on orders table and return sum of all totals
	$queryProducts = 'SELECT * FROM products WHERE categoryID = 2 ORDER BY stock';
	$products = mysqli_query($con, $queryProducts);
	$invSum = 0;
?>

<!doctype HTML>
<html lang="english">

<head>
	<link rel="stylesheet" href="css/account.css">
	<center>
		<h1>Inventory Report</h1>
	</center>
</head>

<body>
	<button onclick="location.href='vendor.php'" style="margin: 15px;">Go back</button>
	<center>
	<div class='container' style='display:flex'>

					<?php foreach ($products as $product) : ?>
				<?php
				$sum += intval($product['stock']);				
				?>
			<?php endforeach ?>
		<div id="box">

			<p>Total books in inventory: <?php echo $sum?></p>
		</div>
		<div id="box">
			<p><b>Low stock books (<10)</b></p>
			<?php foreach ($products as $product) : ?>
				<p><?php
				if (intval($product['stock']) < 10) {
					echo $product['productName'];
				} 
				?></p>
			<?php endforeach ?>
		</div>
	</div>
	</center>
</body>

</html>