<?php
session_start();

    include("connection.php");
	include("functions.php");

    $user_data = check_login($con);
    $user_id = $user_data['user_id'];
    $profile_pic = $_GET['profilepath'];
    $query = "update users set profile_pic = '$profile_pic' where user_id = '$user_id'";
    mysqli_query($con, $query);

    header("Location: account.php");
    die;

?> 