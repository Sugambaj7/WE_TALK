<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
         include '../connection/connection.php';
         $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
         $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
         $output = "";

         $query = "SELECT * FROM messages
         LEFT JOIN users_registration ON users_registration.unique_id = messages.outgoing_msg_id
         WHERE
         (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                //sender
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="flex flex-row justify-between">
                    <div class="left-content">

                    </div>
                    <div class="flex flex-col">
                        <div class="outgoing-text">
                            <p class="py-2 px-5" >
                            '.$row['msg'].'</p>
                        </div>
                        <div class="flex flex-row">
                            <div>
                                <a href="#">Edit</a>
                            </div>
                            <div>
                                |
                            </div>
                            <div>
                                <a href="delete_msg.php?delete_msg_unique_id='.$row['msg_id'].'">Delete</a>
                            </div>
                        </div>
                    </div> 
                </div>
                     ';
                }
                else{//receiver
                    $output .= ' <div class="flex flex-row ">
                                    <div class="left-content flex justify-center items-center">
                                        <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="./uploads/user_image/'.$row['user_image'].'" alt="">
                                    </div>
                                    <div class="incoming-text">
                                        <p class="py-2 px-5" >'.$row['msg'].'</p>
                                    </div>
                                </div> ';
                }
            }
            echo $output;
         }
    }
    else{
        header("location: ./login.php");
    }
?>