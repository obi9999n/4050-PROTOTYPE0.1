<?php

function check_login($con) {

    if(isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;

}

function check_if_admin($con) {
    $user_data = check_login($con);
    $user_type = $user_data['user_type'];
    if ($user_type == '1') {
        return $user_type;
    }

    header("Location: account.php");
    die;

}

function check_if_vendor_and_admin($con) {
    $user_data = check_login($con);
    $user_type = $user_data['user_type'];
    if ($user_type == '2' || $user_type == '1') {
        return $user_type;
    }

    header("Location: account.php");
    die;

}

function random_num($length) {

    $text = "";
    if($length < 5) {
        $length = 5;
    }

    $len = rand(4,$length);

    for($i=0; $i < $len; $i++) {
        $text .= rand(0,9);
    }

    return $text; 

}

?>