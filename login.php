<?php
session_start();

	include("connection.php");
	include("functions.php");

	$validInfoNeeded = 0;
	$wrongUserOrPass = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
		$check = 0;
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
		$check = $_POST['check'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            // read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            
            // read
            $result = mysqli_query($con, $query);

            // send to index page
			if($result) {
				if($result && mysqli_num_rows($result) > 0) {
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['password'] == $password) {
						$_SESSION['user_id'] = $user_data['user_id'];
						if ($check=='1') {
							setcookie($user_data['user_name'], TRUE, time() + 86400);
							$check = '0';
						}
						header("Location: home.php");
            			die;
					}
				}
			}
			$wrongUserOrPass = 1;
        } else {
            $validInfoNeeded = 1;
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="shortcut icon" href="images/atllogo3.png">
    <link rel="stylesheet" href="css/home-style.css">

    <link rel="stylesheet" href="style/normalize.css">
    <!-----for icons------>
    <link href='https://css.gg/css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
</head>
<body>
    <div>
        <div class="page-title-container">
            <h2 class="page-title">ATLANTA BOOKSTORE</h2>
        </div>
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
                    <li><a href="featured.php">Featured</a></li>
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
    </div>
	<div class="homepagecontent">
        <img src="images/pexels-richard-solano-5796567.jpg" alt="" style="width: 100%">
        <div class="homepage-content-container">
		<div id="box">
        <form method="post">
            <b><div style="font-size: 20px; margin: 5px; color: black">Login</div></b>
            <hr>
			<?php if ($validInfoNeeded == 1) { ?>
				<?php $validInfoNeeded = 0; ?>
				<p>Please enter some valid information.</p>
			<?php } ?>
			<?php if ($wrongUserOrPass == 1) { ?>
				<?php $validInfoNeeded = 0; ?>
				<p>Wrong username or password.</p>
			<?php } ?>
            <div class="login-section">
                <label>Username</label>
                <input id="text" type="text" name="user_name"><br>
            </div>
			
            <div class="login-section">
                <label>Password</label>
                <input id="text" type="password" name="password"><br>
            </div>
			
            <div class="login-section">
                <label>Remember me</label>
                <input type="checkbox" value="1" name="check"><br>
            </div>
			<div class="login-section">
                <input style="width: 260px;" id="button" type="submit" value="Login"><br>
                <center><a href="signup.php">Click to Signup!</a><br></center>
                <center><a href="forgotPassword.php">Forgot Password?</a><br></center>
            </div>
            
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