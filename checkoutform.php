<?php
  session_start();

	include("connection.php");
	include("functions.php");

  $user_data = check_login($con);

  $queryProducts = 'SELECT DISTINCT * FROM products, cart WHERE products.productID = cart.productID ORDER BY products.productID';
  $products = mysqli_query($con, $queryProducts);
  $result_count = mysqli_num_rows($products);
  $queryAllProducts = 'SELECT * FROM products, cart WHERE products.productID = cart.productID ORDER BY products.productID';
  $sum = 0;
  $promosum = 0;
  $queryPromos = 'SELECT * FROM promos WHERE 1';
  $promos = mysqli_query($con, $queryPromos);
  $products1 = mysqli_query($con, $queryAllProducts);
  $result_count1 = mysqli_num_rows($products1);
  $orderNum = rand(10000,99999);
  $hasPromo = false;
  $promoPercent = 0;
foreach ($products1 as $product){
	     $sum+=$product['listPrice'];

} 
foreach ($promos as $promo){
	if ($_REQUEST['code'] == $promo['promocode']){
	$promosum = $sum * ((100 - $promo['promopercent'])/100);
	$hasPromo = true;
  $promoPercent = $promo['promopercent'];
	}
}
	$sum = number_format($sum, 2, '.', '');
	$promosum = number_format($promosum, 2, '.', '');

 ?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/CheckoutForm.css">
    <link rel="shortcut icon" href="images/atllogo.png">
    <!-- <link rel="stylesheet" href="style/normalize.css"> -->
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
            <!--input-->
            <input type="text" placeholder="Search for Product"/>
            <!--cancel-button---->
            <a href="#" class="search-cancel">
                <i class="gg-close"></i>
            </a>
        </div>
    </div>
    <!--lightslider----->
    <ul id="autoWidth" class="cs-hidden">
        <li class="item-a"></li>
        <li class="item-b"></li>
        <li class="item-c"></li>
        <li class="item-d"></li>
        <li class="item-e"></li>
      </ul>


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

<div class="topbannercontainer">
            <p id="topbannertitle">PAYMENT & SHIPPING INFORMATION</p>
</div>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="confirmation.php" method="get">
      <input type="hidden" name="orderNum" value=<?php echo $orderNum; ?>>
      <input type="hidden" name="username" value=<?php echo $user_data['user_name']; ?>>
      <?php if ($hasPromo == true):?>
			  <input type="hidden" name="total" value=<?php echo $promosum; ?>>		  
      <?php else: ?>
        <input type="hidden" name="total" value=<?php echo $sum; ?>>
      <?php endif; ?>	
	 <button name="reserve" class="btn" onclick="reserveFunc()">Pick-up Order in Store (Pay with Cash)</button>
        <div id="myDIV">
          <div class="row">
            
            <div class="col-50">
              <h3>Shipping Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Steve Jobs">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com">
              
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="45 Baxter Street">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="Athens">
            
              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="GA">
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="30606">
                </div>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <!-- <label for="reserve"> <input type="checkbox" name="reserve"> Cash (Pick-up Order in Store) </label> -->
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Steve Jobs">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="January">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2022">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123">
              </div>
            </div>
          </div>
          
        </div>

          <input type="checkbox" checked="unchecked" name="sameadr" id="sameadr" onclick="ShowHideDiv(this)"> Billing Address same as Shipping Address
          <div id="billingDiv" style="display: none">
          <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="Steve Jobs">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com">
              
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="45 Baxter Street">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="Athens">
            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="GA">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="30606">
              </div>
            </div>
          </div>    
</div>
        <input type="submit" value="Continue to checkout" class="btn">
</form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $result_count1; ?></b></span></h4>
      <?php foreach ($products as $product) : ?>
        <p><a href="marketplace.php"><?php echo $product['productName']; ?></a> (Stock: <?php echo $product['stock'] ?>) 
        <?php if ($product['stock'] != 0) { ?>
          <a href="addToCart2.php?productID=<?php echo $product['productID']; ?>"> + </a>
        <?php } ?>
        <a href="removeFromCart2.php?productID=<?php echo $product['productID']; ?>"> - </a> <span class="price">$<?php echo $product['listPrice']; ?></span>
        </p>
        <?php endforeach; ?>

      <hr>
	 <p>Total<span class="price" style="color:black"><b>$<?php echo $sum;?></b></span></p>
      <form action="checkoutform.php">
        <label for="promo">Promo Code<input type="text" id ="code" name="code"></label>
        <input type="submit" value="Add Promo" class="btn">        
		<?php if ($hasPromo == true):?>
      <p>Promo <span class="price" style="color:black"><b><?php echo $promoPercent;?>%</b></span></p>		
			<p>Total with Promo <span class="price" style="color:black"><b>$<?php echo $promosum;?></b></span></p>		  
		<?php endif ?>
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
</body>
<script>
	function reserveFunc() {
		// location.assign('');

		alert('You must pick up your order within 5 days.');
	}

    function ShowHideDiv(check) {
        var billDiv = document.getElementById("billingDiv");
        billDiv.style.display = check.checked ? "none" : "block";
    }
</script>
</html>