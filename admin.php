<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_admin($con);

    $queryUsers = 'SELECT * FROM users WHERE user_type = 0';
    $users = mysqli_query($con, $queryUsers);
    $queryProducts = 'SELECT * FROM products WHERE categoryID = 2';
    $products = mysqli_query($con, $queryProducts); 

?>

<!doctype HTML>
<html lang="english">
    <head>
        <link rel="stylesheet" href="css/account.css">
        <center><h1>Admin Controls</h1></center>
    </head>

    <body>
        <div class="admin-nav">
                <div>
                    <button class="admin-nav-button"><a style="color: black;" href="account.php">Account Settings</a></button>
                </div>
                <div>
                    <button class="admin-nav-button"><a style="color: black;" href="home.php">Home</a></button>
                </div>
                <div>
                    <button class="admin-nav-button"><a style="color: black;" href="logout.php">Logout</a></button>
                </div>
        </div>
        <center>
            <div class="tab">
                <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'London')">Manage Users</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Manage Catalog</button>
            </div>

            <!-- Tab content -->
            
        </center>   
		<center>
            <div id="London" class="tabcontent">
                <table class="admin-user-table">
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Date Registered</th>
                        <th>User Type</th>
                        <th>Birthday</th>
                    </tr>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <td id="id<?php echo $user['user_id']?>" class="block">
                            <?php echo $user['user_id']?>
                        </td>
                        <td id="title<?php echo $user['user_id']?>" class="data">
                            <?php echo $user['user_name'] ?>
                        </td>
                        <td id="author<?php echo $user['user_id']?>" class="data"><?php echo $user['password'] ?>
                        </td>
                        <td id="genre<?php echo $user['user_id']?>" class="data"><?php echo $user['date'] ?>
                        </td>
                        <td id="stock<?php echo $user['user_id']?>" class="data"><?php echo $user['user_type'] ?>
                        </td>
                        <td id="isbn<?php echo $user['user_id']?>" class="data"><?php echo $user['birthday'] ?>
                        </td>
                        <td id="buttons<?php echo $user['user_id']?>" class="data">
                            <button id="save<?php echo $user['user_id']?>"
                                onclick="location.href='updateUser.php?id=<?php echo $user['user_id'] ?>'">Update </button> <button
                                id="delete<?php echo $user['user_id']?>">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach?>

                    <tr>
                        <td><input type="text" style="width:40px"></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><input type="text" style="width:125px"></td>
                        <td><input type="text" style="width:75px"></td>
                        <td><input type="text" style="width:125px"></td>
                        <td><button>add</button></td>
                    </tr>
                </table>
            </div>
		</center> 
        <center>
            <div id="Paris" class="tabcontent">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Stock</th>
                        <th>ISBN</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Image path (jpeg)</th>
                        <th></th>
                    </tr>
                    <?php foreach ($products as $product) : ?>
                    <tr>
                        <td id="id<?php echo $product['productID']?>">
                            <?php echo $product['productID']?>
                        </td>
                        <td id="title<?php echo $product['productID']?>">
                            <?php echo $product['productName'] ?>
                        </td>
                        <td id="author<?php echo $product['productID']?>"><?php echo $product['author'] ?>
                        </td>
                        <td id="genre<?php echo $product['productID']?>"><?php echo $product['genre'] ?>
                        </td>
                        <td id="stock<?php echo $product['productID']?>"><?php echo $product['stock'] ?>
                        </td>
                        <td id="isbn<?php echo $product['productID']?>"><?php echo $product['ISBN'] ?>
                        </td>
                        <td id="type<?php echo $product['productID']?>">
                            <?php echo $product['productCode'] ?>
                        </td>
                        <td id="price<?php echo $product['productID']?>">
                            <?php echo $product['listPrice'] ?>
                        </td>
                        <td id="img<?php echo $product['productID']?>"><?php echo $product['imagePath'] ?>
                        </td>
                        <td id="buttons<?php echo $product['productID']?>">
                            <button id="save<?php echo $product['productID']?>"
                                onclick="location.href='updateItem.php?id=<?php echo $product['productID'] ?>'">update
                            </button> <button id="delete<?php echo $product['productID']?>"
                                onclick="location.href='deleteItem.php?id=<?php echo $product['productID'] ?>'">delete</button>
                        </td>
                    </tr>
                    <?php endforeach?>
                    <tr>
                        <!-- <td><input type="text" style="width:40px"></td> -->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button onclick="location.href='addItem.php'">add new boook</button></td>
                    </tr>
                </table>
            </div>
        </center>
        
        <script type="text/javascript">
            document.getElementById("defaultOpen").click();

            function openCity(evt, cityName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }            
        </script>
    </body> 

</html>