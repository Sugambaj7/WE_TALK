<?php 

    session_start();
    if(isset($_SESSION['unique_id']) && !empty($_SESSION['unique_id'])){
        include '../connection/connection.php';
        if(isset($_GET['delete_msg_unique_id'])){
                $delete_msg_unique_id = (int)$_GET['delete_msg_unique_id'];
                $query = "DELETE FROM messages where msg_id = {$delete_msg_unique_id}";
                $result = mysqli_query($conn,$query);
                if($result){
                    $id = $_SESSION['chat_garne_user_id'];
                    header("location: ./chats.php?user_id=$id");
                }
             }
             else{
                echo "which to delete?";
             }
               }
        else{
        header("location: ./login.php");
    }  
?>