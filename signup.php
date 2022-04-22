<?php
session_start();

	include("connection.php");
	include("functions.php");

    $validInfoNeeded = 0;
    $validUsername = 0;

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

            if ($result_count == 0) {
                // save to database
                $user_id = random_num(20);
                $query = "insert into users (user_id, firstName, lastName, email, address, city, state, zipCode, user_name, password, birthday, user_type) values ('$user_id', '$first_name', '$last_name', '$email', '$address', '$city', '$state', '$zip_code', '$user_name', '$password', '$birthday', '0')";
            
                // save
                mysqli_query($con, $query);

                // send to login page
                header("Location: login.php");
                die;

            } else {
                $validUsername = 1;
            }

        } else {
            $validInfoNeeded = 1;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css" href="css/signupstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="shortcut icon" href="images/atllogo.png">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="css/home-style.css">
    <!-----for icons------>
    <link href='https://css.gg/css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
</head>
<body>
<div class="page-title-container">
        <h2 class="page-title">ATLANTA BOOKSTORE</h2>
    </div>
    <!--navigation---------->
    <nav>
    <!---menu-bar------>
        <div class="navigation">
            <!----logo---->
            <div class="logo-plus-title">
                <a href="home.php" class="logo">
                    <img src="images/atllogo3.png" alt="logo image">
                </a>
            </div>
            <!--menu----->
            <ul class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="featured.php">Featured</a>
                       
                </li>
                <li><a href="marketplace.php">Marketplace</a></li>
            </ul>
            <!--right-menu------>
            <div class="right-menu">
                <!--search--->
                <a href="#" class="search">
                    <i class="gg-search"></i>
                </a>
                <!---user---->
                <?php if(isset($_SESSION['user_id'])) { ?>
                    <a href="account.php">
                        <i class="gg-user"></i>
                    </a>
                <?php } else { ?>
                    <a href="login.php">
                        <i class="gg-user"></i>
                     </a>
                <?php } ?>
                <!---cart----->
                <a href="checkoutform.php">
                    <i class="gg-shopping-cart"></i>
                </a>
            </div>
        </div>
    </nav>

    <!--search-bar------>
    <div class="search-bar">
        <!--search-input-->
        <div class="search-input">
            <form action="search.php" method="GET">
            <!--input-->
                <input id="text" name="s_query" placeholder="Search for Product"/>
            </form>
            <!--cancel-button---->
            <a href="#" class="search-cancel">
                <i class="gg-close"></i>
            </a>
        </div>
    </div>

	<div class="homepagecontent">
        <img src="images/pexels-richard-solano-5796567.jpg" alt="">
        <div class="homepage-content-container">
        <div id="box">
        <form method="post" action="verification.php">
            <b><div style="font-size: 20px; margin-right: 10px; padding-bottom: 10px; color: black">Account Registration</div></b>
            <hr style="margin: 8px;">
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
            <a href="login.php">Back to login</a>
        </form>
    </div>
    </div>
</div>
    <div class="social-call">
        <!---social-links-------->
        <div class="social">
            <a href="https://www.facebook.com/oldnavy/"><i class="gg-facebook"></i></a>
            <a href="https://www.instagram.com/oldnavy/"><i class="gg-instagram"></i></a>
            <a href="https://twitter.com/OldNavy?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class ="gg-twitter"></i></a>
        </div>
        <!---phone-->
        <div class="phone">
            <span> <a href="tel:9999990000">Customer Support<i class="gg-phone"></i></a></span>
        </div>
    </div> 

    <!--jQuery------>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!---script-------->
    <script type="text/javascript">
    $(document).on('click','.search',function(){
        $('.search-bar').addClass('search-bar-active')
    });

    $(document).on('click','.search-cancel',function(){
        $('.search-bar').removeClass('search-bar-active')
    });
    </script>
</body>

</html>