<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
    // $type = check_if_vendor_and_admin($con);
//   $orders = query on orders table and return number of rows
//	$totalSales = query on orders table and return sum of all totals
    $query1 =  "SELECT * FROM orders";
    $result1 = mysqli_query($con, $query1);
    $result_count1 = mysqli_num_rows($result1);
    // $result1b = mysqli_fetch_row($result)[0];
    $query2 =  "SELECT * FROM orders WHERE in_store = 1";
    $result2 = mysqli_query($con, $query2);
    $result_count2 = mysqli_num_rows($result2);
    $allSales = "SELECT * FROM orders";
    $sales = mysqli_query($con, $allSales);
    foreach ($sales as $sale) :
        $sum += $sale['total'];
    endforeach;

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
            <p>Orders placed: <?php echo $result_count1;?></p>
            <p>Pick-up orders: <?php echo $result_count2;?></p>
            <p>Total sales: <?php echo $sum;?></p>
        </center>
    </div>
</body>

</html>