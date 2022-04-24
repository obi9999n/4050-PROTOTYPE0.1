<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);

?>

<!doctype HTML>
<html lang="english">
    <head>
        <link rel="stylesheet" href="css/account.css">
        <center><h1>Change Profile Picture</h1></center>
    </head>

    <body>
        <center><img src="images/default.jpeg"><br><br>
        <button><a href="updateProfilePic.php?profilepath=images/default.jpeg">Update Picture!</a></button><br><br>
        <center><img src="images/default2.jpeg"><br><br>
        <button><a href="updateProfilePic.php?profilepath=images/default2.jpeg">Update Picture!</a></button><br><br>
        <center><img src="images/default3.jpeg"><br><br>
        <button><a href="updateProfilePic.php?profilepath=images/default3.jpeg">Update Picture!</a></button><br><br>   
        <center><p><a href="account.php">Go back to account settings!</a></p>
    </body>

</html>