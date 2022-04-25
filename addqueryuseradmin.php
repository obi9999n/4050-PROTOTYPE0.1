<?php
session_start();

	include("connection.php");
	include("functions.php");

    $validInfoNeeded = 0;
    $validUsername = 0;
    $emailErr = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip_code = $_POST['zip_code'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $birthday = strtotime($_POST["birthday"]);
        $birthday = date('Y-m-d', $birthday);

        if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($address) && !empty($city) && !empty($state) && !empty($zip_code) && !empty($user_name) && !empty($password) && !empty($birthday) && !is_numeric($user_name)) {
            $usernameQuery = "SELECT DISTINCT * FROM users WHERE UPPER(user_name) LIKE UPPER('$user_name')";
            $nonValidUsername = mysqli_query($con, $usernameQuery);
            $result_count = mysqli_num_rows($nonValidUsername);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 1;
            } else {
                if ($result_count == 0) {
                    // save to database
                    $user_id = random_num(20);
                    $query = "insert into users (user_id, firstName, lastName, email, address, city, state, zipCode, user_name, password, birthday, user_type, profile_pic,verified) values ('$user_id', '$first_name', '$last_name', '$email', '$address', '$city', '$state', '$zip_code', '$user_name', '$password', '$birthday', 0, 'images/default.jpeg', 0)";                
                    // save
                    mysqli_query($con, $query);
    
                    // send to login page
                    echo "<script type='text/javascript'>document.location.href='addusersuccess.php?name=$first_name&email=$email&username=$user_name';</script>";
                    die;
    
                } else {
                    $validUsername = 1;
                }
            }
        } else {
            $validInfoNeeded = 1;
        }
    }

?>
<!doctype HTML>
<html lang="english">

	<head>
		<title>Add User</title>
		<link rel="stylesheet" type="text/css" href="css/signupstyle.css">
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link rel="shortcut icon" href="images/atllogo.png">
		<link rel="stylesheet" href="style/normalize.css">
		<link rel="stylesheet" href="css/home-style.css">
		<!-----for icons------>
		<link href='https://css.gg/css' rel='stylesheet'>
		<link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
		<link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
		<center>
			<p> <a href="admin.php">Admin Controls</a></p>
		</center>
	</head>

	<body>
		<center>
			<div id="box">
						<form method="post">
							<b><div style="font-size: 20px; margin-right: 10px; padding-bottom: 10px; color: black">Add User</div></b>
							<hr style="margin: 8px;">
							<?php if ($emailErr == 1) { ?>
								<?php $emailErr = 0; ?>
								<center><p>Not a valid email address. Please try again.</p></center>
							<?php } ?>
							<?php if ($validInfoNeeded == 1) { ?>
								<?php $validInfoNeeded = 0; ?>
								<center><p>Please enter some valid information.</p></center>
							<?php } ?>
							<?php if ($validUsername == 1) { ?>
								<?php $validUsername = 0; ?>
								<center><p>Username is not valid. Please try again.</p></center>
							<?php } ?>
							<div class="signup-section">
								<label>First Name</label>
								<input id="text" type="text" name="first_name"><br><br>
							</div>
							<div class="signup-section">
								<label>Last Name</label>
								<input id="text" type="text" name="last_name"><br><br>
							</div>
							<label>Email Address</label>
							<input id="text" type="text" name="email"><br><br>
							<label>Street Address</label>
							<input id="text" type="text" name="address"><br><br>
							<div>
								<label>City</label>
								<input id="text" type="text" name="city" size=10><br><br>
							</div>
							<div>
								<label>State</label>
								<input id="text" type="text" name="state" size=10><br><br>
							</div>
							<div>
								<label>Zip Code</label>
								<input id="text" type="text" name="zip_code" size=17><br><br>
							</div>
							<label>Username</label>
							<input id="text" type="text" name="user_name"><br><br>
							<label>Password</label>
							<input id="text" type="password" name="password"><br><br>
							<label>Birthday</label>
							<input id="text" type="date" name="birthday"><br><br>
							<input style="width: 475px;" id="button" type="submit" value="Signup"><br><br>
						</form>
			</div>
		</center>
	</body>

</html>