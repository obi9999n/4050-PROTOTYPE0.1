<?php
session_start();

	include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $type = check_if_admin($con);

    $queryUsers = 'SELECT * FROM users WHERE user_type = 0';
    $users = mysqli_query($con, $queryUsers);

?>

<!doctype HTML>
<html lang="english">
    <head>
        <link rel="stylesheet" href="css/account.css">
        <center><h1>Admin Controls</h1></center>
    </head>

    <body>
        <center>
            <p>Weclome!</p><br>
            <div class="tab">
                <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'London')">London</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
            </div>

            <!-- Tab content -->
            <div id="London" class="tabcontent">
                <div id="box">
                    <center><p>Current List of Registered Users:</p></center>
                    <?php foreach ($users as $user) : ?>
                        <center><p><?php echo $user['user_name']; ?></p></center>
                    <?php endforeach; ?>
                    <a href="account.php">Back to account settings!</a><br><br>
                    <a href="home.php">Back to home!</a><br><br>
                    <a href="logout.php">Click here to logout!</a><br>
                </div>  
            </div>

            <div id="Paris" class="tabcontent">
                <h3>Paris</h3>
                <p>Paris is the capital of France.</p>
            </div>

            <div id="Tokyo" class="tabcontent">
                <h3>Tokyo</h3>
                <p>Tokyo is the capital of Japan.</p>
            </div>
            <div>
                <a href="account.php">Back to account settings!</a><br><br>
                <a href="home.php">Back to home!</a><br><br>
                <a href="logout.php">Click here to logout!</a><br>
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