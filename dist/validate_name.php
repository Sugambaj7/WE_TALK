<?php

session_start();
include '../connection/connection.php';

$new_user_name = mysqli_real_escape_string($conn, $_POST['update_user_name']);

$new_user_name_pattern = '/^[A-Z][a-z]{2,10}/';

if(!empty($new_user_name)){
    if(preg_match($new_user_name_pattern, $new_user_name)){
       $query3 = "UPDATE users_registration SET user_name = '{$new_user_name}' WHERE unique_id = '{$_SESSION['unique_id']}'";
       $result3 = mysqli_query($conn, $query3);
       echo "success";
    }
    else{
        echo "Name must be in format :Firstname Lastname";
    }
}
else{
    echo "Please enter a name!";
}
?>