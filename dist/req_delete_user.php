<?php

session_start();
include '../connection/connection.php';

$delete_user_email = mysqli_real_escape_string($conn, $_POST['delete_user_email']);

if(!isset($_SESSION['unique_id']) && empty($_SESSION['unique_id'])){
    header("location: ./login.php");
}
else if(!empty($delete_user_email)){
    $delete_status = true;
    $query2 = "SELECT * FROM delete_user WHERE delete_user_email = '{$delete_user_email}'";
    $result2 = mysqli_query($conn, $query2);
    if(mysqli_num_rows($result2)>0){
        echo "You have already requested to delete account linked to". " " . $delete_user_email ."Your account will soon be deleted! ";
        session_unset();
        session_destroy();
    }
    else{
        $query = "insert into delete_user (delete_user_email,delete_status) values ('{$delete_user_email}','{$delete_status}')";
        $result = mysqli_query($conn, $query);
        if($result){
            $query3 = "UPDATE users_registration SET delete_status = '{$delete_status}' WHERE user_email = '{$delete_user_email}'";
            $result3 = mysqli_query($conn, $query3);
            if($result3){
                echo "You have requested to delete account linked to" ." " . $delete_user_email . "Your account will soon be deleted";
                session_unset();
                session_destroy();
            }
        }
        else{
            echo "Error while deleting user";
        }
    }
}
else{
    echo "Delete button need to be clicked";
}


?>