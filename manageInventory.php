<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);

    $queryProducts = 'SELECT * FROM products WHERE categoryID = 2';
    $products = mysqli_query($con, $queryProducts);

?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Manage Inventory</title>
	<link rel="stylesheet" href="css/account.css">
	<link rel="stylesheet" href="css/manageInventory.css">
	<button onclick="location.href='vendor.php'" style="margin: 15px;">Go back</button>
	<center>
		<h1>Manage Inventory</h1>
	</center>
</head>

<body>
	<div style="display:inline-block">
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Author</th>
					<th>Genre</th>
					<th>Stock</th>
					<th>ISBN</th>
					<th>Type</th>
					<th>Price</th>
					<th>Image path (jpeg)</th>
					<th></th>
				</tr>
				<?php foreach ($products as $product) : ?>
				<tr>
					<td id="id<?php echo $product['productID']?>">
						<?php echo $product['productID']?>
					</td>
					<td id="title<?php echo $product['productID']?>">
						<?php echo $product['productName'] ?>
					</td>
					<td id="author<?php echo $product['productID']?>"><?php echo $product['author'] ?>
					</td>
					<td id="genre<?php echo $product['productID']?>"><?php echo $product['genre'] ?>
					</td>
					<td id="stock<?php echo $product['productID']?>"><?php echo $product['stock'] ?>
					</td>
					<td id="isbn<?php echo $product['productID']?>"><?php echo $product['ISBN'] ?>
					</td>
					<td id="type<?php echo $product['productID']?>">
						<?php echo $product['productCode'] ?>
					</td>
					<td id="price<?php echo $product['productID']?>">
						<?php echo $product['listPrice'] ?>
					</td>
					<td id="img<?php echo $product['productID']?>"><?php echo $product['imagePath'] ?>
					</td>
					<td id="buttons<?php echo $product['productID']?>">
						<button id="save<?php echo $product['productID']?>"
							onclick="location.href='updateItem.php?id=<?php echo $product['productID'] ?>'">update
						</button> <button id="delete<?php echo $product['productID']?>"
							onclick="location.href='deleteItem.php?id=<?php echo $product['productID'] ?>'">delete</button>
					</td>
				</tr>
				<?php endforeach?>
				<tr>
					<!-- <td><input type="text" style="width:40px"></td> -->
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><button onclick="location.href='addItem.php'">add new boook</button></td>
				</tr>
			</table>
		</center>
	</div>
</body>

</html>