<?php
        function aesDecrypt($encryptedlastmsg, $key)
        {
            $encryptedData = base64_decode($encryptedlastmsg);
            $iv = substr($encryptedData, 0, openssl_cipher_iv_length('aes-256-cbc'));
            $iv = str_pad($iv, 16, "\0");
            $encryptedData = substr($encryptedData, openssl_cipher_iv_length('aes-256-cbc'));
            $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
            return $decryptedData;
        }

        while($row = mysqli_fetch_assoc($result)){
            $query2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            if(mysqli_num_rows($result2)>0){
                $encryptedlastmsg = $row2['msg'];
                $decryptedlastMsg = aesDecrypt($encryptedlastmsg, $key);
            }
            else{
                $decryptedlastMsg = "No message available";
            }

            (strlen($decryptedlastMsg)>28) ? $msg = substr($decryptedlastMsg, 0, 28).'....' : $msg = $decryptedlastMsg;
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = " ";
            // ($row['status'] == "Offline ") ? $status = "offline" : $status = "online";

            $output.='<div>
                        <a href="chats.php?user_id='.$row['unique_id'].'">
                            <div class="flex flex-row">
                                    <div class="w-10 h-10 border border-solid border-black">
                                        <img src="./uploads/user_image/'. $row['user_image'] . '"  alt="">
                                    </div>
                                    <div class="flex flex-col">
                                        <div>
                                           <span>'.$row['user_name'].'</span>
                                        </div>
                                        <div>
                                            <p>'. $you . $msg .'</p>
                                        </div>
                                    </div>
                                    <div class="'.$row['status'].'">
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </div>
                        </a>
                    </div>';
        }
?>