<?php
session_start();

	include("connection.php");
	include("functions.php");

    $queryProducts = 'SELECT * FROM products WHERE categoryID = 2 ORDER BY productID';
    $products = mysqli_query($con, $queryProducts);
    
?>

<!doctype HTML>
<html lang="english">
<head> 
    <title>Featured</title>
    <link rel="shortcut icon" href="images/icon.jpg">
    <link rel="stylesheet" href="css/home-style.css">
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
                        <img src="images/atllogo2.png" alt="logo image">
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
    <div class="body0">
        <div class="featured-top-banner">
            <div>
                <p id="topbannertext">Make sure to sign up for our monthly newsletter!</p>
            </div>
        </div>
        <div class="topbannercontainer">
            <p id="topbannertitle">MARKETPLACE</p>
        </div>
        <div class="featured-items-container">
            <div class="featured-container">
                <?php foreach ($products as $product) : ?>
                <div class="featured-item">
                    <div>
                        <div class="item-info">
                            <div>
                                <p class="item=text"><?php echo $product['productName']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="open" data-target="<?php echo $product['productName']; ?>" data-modal="<?php echo $product['productName']; ?>">
                            <img class="image" src="<?php echo $product['imagePath']; ?>" alt="red rhude T-shirt"
                                width="150px"
                                height="225px"
                            >
                        </button>
                        <div class="modal-container" id="<?php echo $product['productName']; ?>">
                            <div class="modal">
                                <div class="body">
                                    Name: <?php echo $product['productName']; ?>
                                    <h1><?php echo $product['productName']; ?></h1>
                                    <p>Stock: <?php echo $product['stock']; ?></p>
                                    <p class="item=text"><?php echo $product['productName']; ?></p>
                                </div>
                                <button class="close" id="close">
                                    Close me
                                </button>
                            </div>
                        </div>  
                    </div>
                    <!--
                    <div class="button-area">
                        <?php if (isset($_SESSION['user_id'])) {
                            if ($product['stock'] >= 1) { ?>
                                <button class="featured-out-of-stock"><a href="addToCart.php?productID=<?php echo $product['productID']; ?>">ADD TO CART</a></button>
                            <?php } else { 
                                    if ($product['inCart'] == 1) { ?>
                                        <button class="featured-out-of-stock"><a href="removeFromCart.php?productID=<?php echo $product['productID']; ?>">REMOVE FROM CART</a></button>
                                    <?php } else { ?>
                                        <button class="featured-out-of-stock">OUT OF STOCK</button>
                                    <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <button class="featured-out-of-stock"><a href="login.php">Login to add to cart!</a></button>
                        <?php } ?>  
                    </div> -->
                </div>
                <?php endforeach; ?>
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

    var modalBtns = document.querySelectorAll(".open");

    modalBtns.forEach(function(btn) {
        btn.onclick = function() {
            var modal = btn.getAttribute("data-modal");
            modal_containter = document.getElementById(modal);
            modal_containter.classList.add('show');
        };
    });

    var closeBtns = document.querySelectorAll(".close");

    closeBtns.forEach(function(btn) {
        btn.onclick = function() {
            modal_containter.classList.remove('show');
        };
    });

    $(document).on('click','.search',function(){
        $('.search-bar').addClass('search-bar-active')
    });

    $(document).on('click','.search-cancel',function(){
        $('.search-bar').removeClass('search-bar-active')
    });
    </script> 
</body>