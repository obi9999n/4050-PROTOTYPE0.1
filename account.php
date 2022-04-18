<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_id = $user_data['user_id'];
        if ($_POST['submitUsername']) {
            $user_name = $_POST['user_name'];
            if (!empty($user_name)) {
                $emptyUser = 0;
                $validUsername = 0;
                $usernameQuery = "SELECT DISTINCT * FROM users WHERE UPPER(user_name) LIKE UPPER('$user_name')";
                $nonValidUsername = mysqli_query($con, $usernameQuery);
                $result_count = mysqli_num_rows($nonValidUsername);
                if ($result_count == 0) {
                    $query = "update users set user_name = '$user_name' where user_id = '$user_id'";
                    mysqli_query($con, $query);
                    header("Location: account.php");
                    die;
                } else {
                    $validUsername = 1;
                }
            } else {
                $emptyUser = 1;
            }
        }
        if ($_POST['submitPassword']) {
            $password = $_POST['password'];
            if (!empty($password)) {
                $emptyPassword = 0;
                $query = "update users set password = '$password' where user_id = '$user_id'";
                mysqli_query($con, $query);
                header("Location: account.php");
                die;
            } else {
                $emptyPassword = 1;
            }
        }
    }

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
            <form method="post">
                <p>Change username:</p>
			    <label>New Username</label>
                <input id="text" type="text" name="user_name"><br><br>
                <input id="button" type="submit" name="submitUsername" value="Submit"><br><br>
                <?php if ($emptyUser == 1) { ?>
                    <p>Error: Field is empty. Please try again.<p>
                <?php } ?> 
                <?php if ($validUsername == 1) { ?>
                    <p>Error: Username is already taken. Please try again.<p>
                <?php } ?> 
                <p>Change password:</p>
			    <label>New Password</label>
                <input id="text" type="password" name="password"><br><br>
                <input id="button" type="submit" name="submitPassword" value="Submit"><br><br>
                <?php if ($emptyPassword == 1) { ?>
                    <p>Error: Field is empty. Please try again.<p>
                <?php } ?> 
                <p>Change Address:</p>
			    <label>New Address</label><br>
                <input id="text" type="password" name="address"><br><br>
                <input id="button" type="submit" name="submitAddress" value="Submit"><br><br>
                <?php if ($emptyPassword == 1) { ?>
                    <p>Error: Field is empty. Please try again.<p>
                <?php } ?> 
                <p>Change City:</p>
			    <label>New City</label><br>
                <input id="text" type="password" name="city"><br><br>
                <input id="button" type="submit" name="submitCity" value="Submit"><br><br>
                <?php if ($emptyPassword == 1) { ?>
                    <p>Error: Field is empty. Please try again.<p>
                <?php } ?> 
                <p>Change State:</p>
			    <label>New State</label><br>
                <input id="text" type="password" name="state"><br><br>
                <input id="button" type="submit" name="submitState" value="Submit"><br><br>
                <?php if ($emptyPassword == 1) { ?>
                    <p>Error: Field is empty. Please try again.<p>
                <?php } ?> 
                <a href="home.php">Back to home!</a><br><br>
                <a href="logout.php">Click here to logout!</a><br><br>
                <a href="deleteConfirmation.php">Delete account</a><br>
                <?php $user_type = $user_data['user_type']; ?>
                <?php if ($user_type == 1) { ?>
                    <br><a href="admin.php">Admin controls</a><br>
                <?php } ?>
            </form>
        </div>       
    </body>

</html>