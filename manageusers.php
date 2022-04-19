<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_admin($con);

    $queryUsers = 'SELECT * FROM users WHERE user_type = 0';
    $users = mysqli_query($con, $queryUsers);

?>
<!doctype HTML>
<html lang="english">

<head>
	<title>Manage Users</title>
	<link rel="stylesheet" href="css/account.css">
	<link rel="stylesheet" href="css/manageInventory.css">
	<center>
		<h1>Manage Users</h1>
	</center>
</head>

<body>
	<div style="display:inline-block">
		<center>
			<table>
				<tr>
					<th>User ID</th>
					<th>Username</th>
					<th>Password</th>
					<th>Date Registered</th>
					<th>User Type</th>
					<th>Birthday</th>
				</tr>
				<?php foreach ($users as $user) : ?>
				<tr>
					<td id="id<?php echo $user['user_id']?>" class="block">
						<?php echo $user['user_id']?>
					</td>
					<td id="title<?php echo $user['user_id']?>" class="data">
						<?php echo $user['user_name'] ?>
					</td>
					<td id="author<?php echo $user['user_id']?>" class="data"><?php echo $user['password'] ?>
					</td>
					<td id="genre<?php echo $user['user_id']?>" class="data"><?php echo $user['date'] ?>
					</td>
					<td id="stock<?php echo $user['user_id']?>" class="data"><?php echo $user['user_type'] ?>
					</td>
					<td id="isbn<?php echo $user['user_id']?>" class="data"><?php echo $user['birthday'] ?>
					</td>
					<td id="buttons<?php echo $user['user_id']?>" class="data">
						<button id="save<?php echo $user['user_id']?>"
							onclick="location.href='updateUser.php?id=<?php echo $user['user_id'] ?>'">Update </button> <button
							id="delete<?php echo $user['user_id']?>">Delete</button>
					</td>
				</tr>
				<?php endforeach?>

				<tr>
					<td><input type="text" style="width:40px"></td>
					<td><input type="text"></td>
					<td><input type="text"></td>
					<td><input type="text" style="width:125px"></td>
					<td><input type="text" style="width:75px"></td>
					<td><input type="text" style="width:125px"></td>
					<td><button>add</button></td>
				</tr>
			</table>
		</center>
	</div>
</body>


</html>