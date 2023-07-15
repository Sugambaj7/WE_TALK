<?php 

    session_start();
    if(isset($_SESSION['unique_id']) && !empty($_SESSION['unique_id'])){
        include '../connection/connection.php';
        $edit_msg_unique_id = mysqli_real_escape_string($conn,$_POST['edit_msg_unique_id']);
        $edited_message = mysqli_real_escape_string($conn,$_POST['updated-text']);

        $query = "UPDATE messages SET msg = '{$edited_message}' WHERE msg_id = '{$edit_msg_unique_id}'";

                $result = mysqli_query($conn,$query);
                if($result){
                    $query2 = "SELECT * FROM messages WHERE msg_id = {$edit_msg_unique_id}";
                    $result2 = mysqli_query($conn,$query2);
                    if($result2){
                        $id = $_SESSION['chat_garne_user_id'];
                        echo $id;
                    }
                    else{
                        echo "no data";
                    }
                }  
             }
        else{
        header("location: ./login.php");
    }

   
?>