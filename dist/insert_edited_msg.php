<?php 

    session_start();
    if(isset($_SESSION['unique_id']) && !empty($_SESSION['unique_id'])){
        include '../connection/connection.php';
        $edit_msg_unique_id = mysqli_real_escape_string($conn,$_POST['edit_msg_unique_id']);
        $edited_message = mysqli_real_escape_string($conn,$_POST['updated-text']);

        function aesEncrypt($data, $key)
        {
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
            $encryptedData = base64_encode($iv . $encryptedData);
            return $encryptedData;
        }

        $key = '2A2B2C';
        $editdata = $edited_message;
        $encrypted = aesEncrypt($editdata, $key);

        $query = "UPDATE messages SET msg = '{$encrypted}' WHERE msg_id = '{$edit_msg_unique_id}'";

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