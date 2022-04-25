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
        <center><h1>Account Settings</h1></center>
    </head>

    <body>
        <center><p>Welcome <?php echo $user_data['user_name']; ?>!<br></center>
        <div id="box">
            <center><p>Are you sure you want to delete your account?</p></center>
            <center><form method="post">
                <button style="background-color: #e7e7e7; color: blue;" type="submit" name="No"><a href="account.php">No, take me back!</a></button>
                <button style="background-color: #e7e7e7; color: blue;" type="submit" name="Yes"><a href="delete.php?userID=<?php echo $user_data['user_id']; ?>">Yes</a></button>
            </form>
        </div>       
    </body>

</html>