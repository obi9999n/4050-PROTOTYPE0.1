<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
//   $orders = query on orders table and return number of rows
//	$totalSales = query on orders table and return sum of all totals
?>

<!doctype HTML>
<html lang="english">

<head>
    <link rel="stylesheet" href="css/account.css">
    <center>
        <h1>Orders Report</h1>
    </center>
</head>

<body>
    <button onclick="location.href='vendor.php'" style="margin: 15px;">Go back</button>
    <div id="box">
        <center>
            <p>Orders placed: </p>
            <p>Fulfilled online: </p>
            <p>Fulfilled in-store:</p>
        </center>
    </div>
</body>

</html>