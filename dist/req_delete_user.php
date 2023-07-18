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
        echo "You have already requested to delete account linked to". " " . $delete_user_email . "<br>". "Your account will soon be deleted! ";
    }
    else{
        $query = "insert into delete_user (delete_user_email,delete_status) values ('{$delete_user_email}','{$delete_status}')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "You have have a request to delete account linked to" ." " . $delete_user_email . "<br>". "Your account will soon be deleted";
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