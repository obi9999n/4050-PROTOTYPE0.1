<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
//   $orders = query on orders table and return number of rows where dateplaced is today
//	$totalSales = query on orders table and return sum of all totals where date placed is today
?>

<!doctype HTML>
<html lang="english">
    <head>
        <link rel="stylesheet" href="css/account.css">
        <center><h1>End-of-day sales report</h1></center>
    </head>

    <body>
    <button onclick="location.href='vendor.php'" style="margin: 15px;">Go back</button>
        <div id="box">		   
            <center>
			  Orders placed today: <br>
			  Total sales:
		  </center>
        </div>       
    </body>

</html>