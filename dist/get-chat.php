<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
         include '../connection/connection.php';
         $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
         $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
         $output = "";

         function aesDecrypt($encryptedData, $key)
        {
            $encryptedData = base64_decode($encryptedData);
            $iv = substr($encryptedData, 0, openssl_cipher_iv_length('aes-256-cbc'));
            $iv = str_pad($iv, 16, "\0");
            $encryptedData = substr($encryptedData, openssl_cipher_iv_length('aes-256-cbc'));
            $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
            return $decryptedData;
        }

         $query = "SELECT * FROM messages
         LEFT JOIN users_registration ON users_registration.unique_id = messages.outgoing_msg_id
         WHERE
         (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
            $key = '2A2B2C';
            while($row = mysqli_fetch_assoc($result)){
                //sender
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $encrypted = $row['msg'];
                    $decryptedMsg = aesDecrypt($encrypted, $key);
                    $output .= '<div class="flex flex-row justify-between">
                    <div class="left-content">

                    </div>
                    <div class="flex flex-col">
                        <div class="outgoing-text">
                            <p class="py-2 px-5" >
                            '.$decryptedMsg.'</p>
                        </div>
                        <div class="flex flex-row">
                            <div>
                                <a href="edit_msg.php?edit_msg_unique_id='.$row['msg_id'].'">Edit</a>
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
                    $encrypted = $row['msg'];
                    $decryptedMsg = aesDecrypt($encrypted, $key);
                    $output .= ' <div class="flex flex-row ">
                                    <div class="left-content flex justify-center items-center">
                                        <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="./uploads/user_image/'.$row['user_image'].'" alt="">
                                    </div>
                                    <div class="incoming-text">
                                        <p class="py-2 px-5" >'.$decryptedMsg.'</p>
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