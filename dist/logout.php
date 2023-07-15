<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include "../connection/connection.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id) && !empty($logout_id)){
            $status = "Offline";
            $query = "UPDATE users_registration SET status = '{$status}' WHERE unique_id = '{$logout_id}'";
            $result = mysqli_query($conn, $query);
            if($result){
                session_unset();
                session_destroy();
                header("location: ./login.php");
            }
        }else{
            header("location: ./user_dashboard.php");
        }
    }
    else{
        header("location: ./login.php");
    }
?>
