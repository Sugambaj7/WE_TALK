<?php

session_start();
include '../connection/connection.php';

$new_user_phn_num = mysqli_real_escape_string($conn, $_POST['update_user_phn_num']);

$new_user_phn_num_pattern = '/^9[78]\d{8}$/';


if(!empty($new_user_phn_num)){
    if(preg_match($new_user_phn_num_pattern, $new_user_phn_num)){
        $query4 = "UPDATE users_registration SET user_phone = '{$new_user_phn_num}' WHERE unique_id = '{$_SESSION['unique_id']}'";
        $result4 = mysqli_query($conn, $query4);
        echo "success";
    }
    else{
        echo "Phone Number must be in format : 97XXXXXXXX or 98XXXXXXXX";
    }
}
else{
    echo "Please enter a phone number!";
}
?>