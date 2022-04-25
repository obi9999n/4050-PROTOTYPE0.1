<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
$user_id = $user_data['user_id'];
$query = "DELETE FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);

if(isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}

header("Location: home.php");
die;

?>

