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
        <link rel="stylesheet" href="css/account.css">
        <center><h1>Admin Controls</h1></center>
    </head>

    <body>
        <center><p>Weclome!</p><br></center>
        <div id="box">
            <center><p>Current List of Registered Users:</p></center>
            <?php foreach ($users as $user) : ?>
                <center><p><?php echo $user['user_name']; ?></p></center>
            <?php endforeach; ?>
            <a href="account.php">Back to account settings!</a><br><br>
            <a href="home.php">Back to home!</a><br><br>
            <a href="logout.php">Click here to logout!</a><br>
        </div>
    </body> 

</html>