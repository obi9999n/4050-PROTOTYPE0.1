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
                <div class="account-section">
                    <p>Change username:</p>
                    <label>New Username</label>
                    <input style="width: 275px;" id="text" type="text" name="user_name"><br>
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitUsername" value="Submit"><br><br>
                    <?php if ($emptyUser == 1) { ?>
                        <p>Error: Field is empty. Please try again.<p>
                    <?php } ?> 
                    <?php if ($validUsername == 1) { ?>
                        <p>Error: Username is already taken. Please try again.<p>
                    <?php } ?> 
                    <hr>
                </div>
                
                <div class="account-section">
                    <p>Change password:</p>
                    <label>New Password</label>
                    <input style="width: 275px;" id="text" type="password" name="password"><br>
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitPassword" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <p>Error: Field is empty. Please try again.<p>
                    <?php } ?>
                    <hr>
                </div>
                 
                <div class="account-section">
                    <p>Change Address:</p>
                    <label>New Address</label>
                    <input style="width: 275px;" id="text" type="password" name="address"><br>
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitAddress" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <p>Error: Field is empty. Please try again.<p>
                    <?php } ?>
                    <hr>
                </div>
                 
                <div class="account-section">
                    <p>Change City:</p>
                    <label>New City</label>
                    <input style="width: 275px;" id="text" type="password" name="city"><br>
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitCity" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <p>Error: Field is empty. Please try again.<p>
                    <?php } ?> 
                    <hr>
                </div>
                
                <div class="account-section">
                    <p>Change State:</p>
                    <label>New State</label>
                    <input style="width: 275px;" id="text" type="password" name="state"><br>
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitState" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <p>Error: Field is empty. Please try again.<p>
                    <?php } ?> 
                    <hr>
                </div>
                <hr>

                <div class="account-section">
                    <button class="featured-out-of-stock"><a href="home.php">Back to home!</a><br></button>
                    <button class="featured-out-of-stock"><a href="logout.php">Click here to logout!</a><br></button>
                    <button class="featured-out-of-stock"><a href="deleteConfirmation.php">Delete account</a><br></button>
                    <?php $user_type = $user_data['user_type']; ?>
                    <?php if ($user_type == 1) { ?>
                        <button class="featured-out-of-stock"><a href="admin.php">Admin Controls</a><br></button>
                    <?php } ?>
                    <?php if ($user_type == 2) { ?>
                        <button class="featured-out-of-stock"><a href="vendor.php">Vendor controls</a><br></button>
                    <?php } ?>
                </div>
                
            </form>
        </div>       
    </body>

</html>