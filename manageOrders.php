<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);

    $queryOrders = 'SELECT * FROM orders';
    $orders = mysqli_query($con, $queryOrders);

?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Manage Orders</title>
	<link rel="stylesheet" href="css/account.css">
	<link rel="stylesheet" href="css/manageInventory.css">
	<button onclick="location.href='vendor.php'" style="margin: 15px;">Go back</button>
	<center>
		<h1>Manage Orders</h1>
	</center>
</head>

<body>
	<div style="display:inline-block">
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Order Number</th>
					<th>User</th>
					<th>Total</th>
					<th>In-Store?</th>
					<th>Fulfilled?</th>
					<th>Shipping Type</th>
					<th>Shipping Address</th>
					<th>Date Placed</th>
					<th></th>
				</tr>
				<?php foreach ($orders as $order) : ?>
				<tr>
					<td id="id<?php echo $order['id']?>">
						<?php echo $order['id']?>
					</td>
					<td id="oNum<?php echo $order['id']?>">
						<?php echo $order['orderNumber'] ?>
					</td>
					<td id="user<?php echo $order['id']?>"><?php echo $order['user_name'] ?>
					</td>
					<td id="total<?php echo $order['id']?>"><?php echo $order['total'] ?>
					</td>
					<td id="in-store<?php echo $order['id']?>"><?php echo $order['in-store'] ?>
					</td>
					<td id="fulfilled<?php echo $order['id']?>"><?php echo $order['fulfilled'] ?>
					</td>
					<td id="shipping<?php echo $order['id']?>">
						<?php echo $order['shipping'] ?>
					</td>
					<td id="address<?php echo $order['id']?>">
						<?php echo $order['address'] ?>
					</td>
					<td id="date<?php echo $order['id']?>">
						<?php echo $order['datePlaced'] ?>
					</td>
					<td id="buttons<?php echo $order['id']?>">
						<button id="update<?php echo $order['id']?>"
							onclick="location.href='updateOrder.php?id=<?php echo $order['id'] ?>'">update
						</button> <button id="delete<?php echo $order['id']?>"
							onclick="location.href='deleteOrder.php?id=<?php echo $order['id'] ?>'">delete</button>
					</td>
				</tr>
				<?php endforeach?>
			</table>
		</center>
	</div>
</body>

</html>