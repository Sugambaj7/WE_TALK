<?php

include '../connection/connection.php';

$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$user_phn_num = mysqli_real_escape_string($conn, $_POST['user_phn_num']);
$user_addr = mysqli_real_escape_string($conn, $_POST['user_addr']);
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);

if(!empty($user_name) && !empty($user_phn_num)  && !empty($user_addr)  && !empty($user_email)  && !empty($user_pass) ){
    
}else{
    echo "All input fields are required";
}