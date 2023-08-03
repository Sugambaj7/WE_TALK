<?php

session_start();
include '../connection/connection.php';

$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_password = mysqli_real_escape_string($conn, $_POST['user_pass']);

if(!empty($user_email) && !empty($user_password)){
    $query = "SELECT * FROM users_registration WHERE user_email = '{$user_email}' AND user_password = '{$user_password}'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        $query3 = "SELECT * FROM delete_user WHERE delete_user_email = '{$user_email}'";
        $result3 = mysqli_query($conn, $query3);
        if(mysqli_num_rows($result3)>0){
            //if there is a delete request
            echo "Your account is deleted!";
        }
        else{
            $row = mysqli_fetch_assoc($result);//only login user data
            $status = "Active now";
            $query2 = "UPDATE users_registration SET status = '{$status}' WHERE unique_id = {$row['unique_id']}";
            $result2 = mysqli_query($conn, $query2);
           if($result2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success"; 
            }
        }
    }
    else{
        echo "Email or Password is incorrect";
    }
}else{
    echo "All input fields are required";
}
?>