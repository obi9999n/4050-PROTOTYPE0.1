<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if(isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

header("Location: home.php");
die;

?>

