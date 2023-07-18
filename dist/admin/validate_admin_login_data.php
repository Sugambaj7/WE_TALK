<?php

session_start();
include './connection/connection.php';
$admin_username = mysqli_real_escape_string($conn, $_POST['admin_username']);
$admin_password = mysqli_real_escape_string($conn, $_POST['admin_password']);

if(!empty($admin_username) && !empty($admin_password)){
    if($admin_username == "admin" && $admin_password == "admin@123"){
        $_SESSION['admin_unique_id'] = $admin_username;
        echo "success";
    }
    else{
        echo "Username or Password is incorrect";
    }
}
else{
    echo "Email or Password is empty";
}
?>