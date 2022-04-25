<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_vendor_and_admin($con);
    $id = $_GET['id'];
	$queryUser = "SELECT * FROM users WHERE user_id = '$id'";
    $result = mysqli_query($con, $queryUser);
    $title = mysqli_fetch_row($result)[0];	
?>

<!doctype HTML>
<html lang="english">
    <head>
        <link rel="stylesheet" href="css/account.css">
        <center><h1>Delete confirmation</h1></center>
    </head>

    <body>
        <div id="box">
            <center><p>Are you sure you want to delete this user?</p></center>
            <form method="post">
                <button type="submit" name="No"><a href="admin.php">No</a></button>
                <button type="submit" name="Yes"><a href="deleteUserAdmin2.php?id=<?php echo $id; ?>">Yes</a></button>
            </form>
        </div>       
    </body>

</html>