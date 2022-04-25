<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
    $sum = 0;
    // $query1 =  "SELECT * FROM orders";
    $query1 =  "SELECT * FROM orders WHERE datePlaced = CURDATE()";
    $result1 = mysqli_query($con, $query1);
    $result_count1 = mysqli_num_rows($result1);
    $allSales = "SELECT * FROM orders WHERE datePlaced = CURDATE()";
    // $allSales = "SELECT * FROM orders WHERE datePlaced = CURRENT_TIMESTAMP";
    $sales = mysqli_query($con, $allSales);
    foreach ($sales as $sale) :
        $sum += $sale['total'];
    endforeach;
// //   $orders = query on orders table and return number of rows where dateplaced is today
// //	$totalSales = query on orders table and return sum of all totals where date placed is today
// ?>

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
			  Orders placed today: <?php echo $result_count1  ?> <br>
			  Today's sales: <?php echo $sum  ?>
		  </center>
        </div>       
    </body>

</html>