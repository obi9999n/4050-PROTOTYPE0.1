<?php
session_start();

	include("connection.php");
	include("functions.php");

?> 

<!doctype HTML>
<html lang="english">
<head>
    <title>Search</title>
    <link rel="shortcut icon" href="images/atllogo.png">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="css/search-style1.css">
    <link rel="stylesheet" href="css/home-style.css">

    <!-----for icons------>
    <link href='https://css.gg/css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg/icons/all.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>
</head>
<body>
    <?php if (isset($_GET['s_query'])) {
        $s_query = $_GET['s_query'];
        $query = "SELECT DISTINCT * FROM products WHERE UPPER(productName) LIKE UPPER('%$s_query%')";
        $products = mysqli_query($con, $query);
        $result_count = mysqli_num_rows($products);

        if ($result_count == 0) {
            $queryGenre = "SELECT DISTINCT * FROM products WHERE UPPER(genre) LIKE UPPER('$s_query')";
            $products = mysqli_query($con, $queryGenre);
            $result_count = mysqli_num_rows($products);
        } 
        
        if ($result_count == 0) {
            $queryAuthor = "SELECT DISTINCT * FROM products WHERE UPPER(author) LIKE UPPER('%$s_query%')";
            $products = mysqli_query($con, $queryAuthor);
            $result_count = mysqli_num_rows($products);
        }

        if ($result_count == 0) {
            $queryISBN = "SELECT DISTINCT * FROM products WHERE UPPER(ISBN) LIKE UPPER('$s_query')";
            $products = mysqli_query($con, $queryISBN);
            $result_count = mysqli_num_rows($products);
        }
    ?>
    <div class="re-search-bar">
        <!--search-input-->
        <div class="re-search-input">
            <form action="./search.php" method="GET">
            <!--input-->
                <input type="text" name="s_query" placeholder="Search for Product"/>
            </form>
            <!--cancel-button---->
            <!-- <a href="javascript:history.back()">Go Back</a> -->
            <a href="home.php" class="search-cancel">
                <i class="gg-home"></i>
            </a>
        </div>
    </div>
    <div class="featured-items-container">
        <div style="margin-left: 45px;">
            <p> Results for search: <?php echo $s_query;?></p>
        </div>
        <div class="featured-container-2">
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
                                <div class="modal-body">
                                    <div class="modal-image-wrapper">
                                        <img class="modal-image" src="<?php echo $product['imagePath']; ?>" alt="red rhude T-shirt"
                                            width="300px"
                                            height="450px"
                                        >
                                    </div>
                                    <div class="modal-right-container">
                                        <div class="modal-right">
                                            <p style="text-align:left; font-size:20pt; margin-bottom:0px; "><?php echo $product['productName']; ?></h1>
                                            <p style="color:darkgreen; text-align:left; margin-bottom:0px;">Author: <?php echo $product['author']; ?></p>
                                            <p style="text-align:left; margin-top:3px">Genre: <?php echo $product['genre']; ?></p>
                                            <p style="text-align:left; margin-top:3px">Stock: <?php echo $product['stock']; ?></p>
                                        </div>
                                        <hr style="margin-top:0px; margin-left:0px; margin-right:20px; " >

                                        <div class="modal-right">
                                            <p style="text-align:left;">Price: $<?php echo $product['listPrice']; ?></p>                                            
                                        </div>
                                        <div class="modal-right-button">
                                            <!--
                                            <p>Stock: <?php echo $product['stock']; ?></p>
                                            -->
                                            <div class="button-area">
                                                <?php if (isset($_SESSION['user_id'])) {
                                                        if ($product['stock'] >= 1) { ?>
                                                            <button class="featured-out-of-stock"><a href="addToCart.php?productID=<?php echo $product['productID']; ?>">ADD TO CART</a></button>
                                                            <?php if ($product['inCart'] >= 1) { ?>
                                                                <button class="featured-out-of-stock"><a href="removeFromCart.php?productID=<?php echo $product['productID']; ?>">REMOVE FROM CART</a></button>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <?php if ($product['inCart'] >= 1 && $product['stock'] == 0) { ?>
                                                                <button class="featured-out-of-stock">OUT OF STOCK</button>
                                                                <button class="featured-out-of-stock"><a href="removeFromCart.php?productID=<?php echo $product['productID']; ?>">REMOVE FROM CART</a></button>
                                                            <?php } else { ?>
                                                                <button class="featured-out-of-stock">OUT OF STOCK</button>
                                                            <?php } ?>
                                                        <?php } ?>
                                                <?php } else { ?>
                                                    <button class="featured-out-of-stock"><a href="login.php">Login to add to cart!</a></button>
                                                <?php } ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="close" id="close">
                                    Close
                                </button>
                            </div>
                        </div>  
                    </div>
                    <!---
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
                    </div> --->
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
    <?php }?>

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
    </script> 
    
</body>

</html>