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
        if ($_POST['submitAddress']) {
            $address = $_POST['address'];
            if (!empty($address)) {
                $emptyAddress = 0;
                $query = "update users set address = '$address' where user_id = '$user_id'";
                mysqli_query($con, $query);
                header("Location: account.php");
                die;
            } else {
                $emptyAddress = 1;
            }
        }
    }

?>

<!doctype HTML>
<html lang="english">
    <head>
        <link rel="stylesheet" href="css/account.css">
        <center><h1 style="margin-bottom: 0px;">Account Settings</h1></center>
    </head>

    <body>
        <center><p style="margin-top: 0px; margin-bottom: 0px;">Welcome <?php echo $user_data['user_name']; ?>!<br><br></center>
        <center><a href="changeProfilePic.php"><img src="<?php echo $user_data['profile_pic']; ?>"></a><br><br></center>
        <div id="box">
            <form class="form1" method="post">
                <div class="account-section">
                    <label style="align-self: start;">New Username:</label>
                    <input style="width: 275px;" id="text" type="text" name="user_name">
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitUsername" value="Submit"><br><br>
                    <?php if ($emptyUser == 1) { ?>
                        <p></p>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            Error: Field is empty. Please try again.
                        </div>
                    <?php } ?> 
                    <?php if ($validUsername == 1) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            Error: Username is already taken. Please try again.                        
                        </div>
                    <?php } ?> 
                    <hr>
                </div>
                
                <div class="account-section">
                    <label style="align-self: start;">New Password:</label>
                    <input style="width: 275px;" id="text" type="password" name="password">
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitPassword" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            Error: Field is empty. Please try again.
                        </div>
                    <?php } ?>
                    <hr>
                </div>
                 
                <div class="account-section">
                    <label style="align-self: start;">New Address:</label>
                    <input style="width: 275px;" id="text" type="password" name="address">
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitAddress" value="Submit"><br><br>
                    <?php if ($emptyAddress == 1) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            Error: Field is empty. Please try again.
                        </div>
                    <?php } ?>
                    <hr>
                </div>
                 
                <div class="account-section">
                    <label style="align-self: start;">New City:</label>
                    <input style="width: 275px;" id="text" type="password" name="city">
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitCity" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            Error: Field is empty. Please try again.
                        </div>
                    <?php } ?> 
                    <hr>
                </div>
                
                <div class="account-section">
                    <label style="align-self: start;">New State:</label>
                    <input style="width: 275px;" id="text" type="password" name="state">
                    <input class="featured-out-of-stock3" style="width: 275px;" id="button" type="submit" name="submitState" value="Submit"><br><br>
                    <?php if ($emptyPassword == 1) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            Error: Field is empty. Please try again.
                        </div>
                    <?php } ?> 
                </div>
                <div class="account-section">
                    <hr>
                    <?php $user_type = $user_data['user_type']; ?>
                    <?php if ($user_type == 0) { ?>
                        <button class="featured-out-of-stock"><a href="#">Past orders!</a><br></button>
                    <?php } ?>
                    <button class="featured-out-of-stock"><a href="home.php">Back to home!</a><br></button>
                    <button class="featured-out-of-stock"><a href="logout.php">Click here to logout!</a><br></button>
                    <?php if ($user_type == 0) { ?>
                        <button class="featured-out-of-stock"><a href="deleteConfirmation.php">Delete account</a><br></button>
                    <?php } ?>
                    <?php if ($user_type == 1) { ?>
                        <button class="featured-out-of-stock"><a href="admin.php">Admin Controls</a><br></button>
                    <?php } ?>
                    <?php if ($user_type == 2) { ?>
                        <button class="featured-out-of-stock"><a href="vendor.php">Vendor controls</a><br></button>
                    <?php } ?>
                </div>
                
            </form>
        </div> 
        <style>
            .alert {
            opacity: 1;
            transition: opacity 0.6s; /* 600ms to fade out */
            }
        </style>

        <script>
            // Get all elements with class="closebtn"
            var close = document.getElementsByClassName("closebtn");
            var i;

            // Loop through all close buttons
            for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
                close[i].onclick = function(){

                    // Get the parent of <span class="closebtn"> (<div class="alert">)
                    var div = this.parentElement;

                    // Set the opacity of div to 0 (transparent)
                    div.style.opacity = "0";

                    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
            }
        </script>      
    </body>

</html>