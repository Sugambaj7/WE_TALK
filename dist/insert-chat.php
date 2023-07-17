<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
         include '../connection/connection.php';
         $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
         $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
         $unique_msg_id = mysqli_real_escape_string($conn,$_POST['unique_msg_id']);
         $message = mysqli_real_escape_string($conn,$_POST['message']);

         function aesEncrypt($data, $key)
         {
             $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
             $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
             $encryptedData = base64_encode($iv . $encryptedData);
             return $encryptedData;
         }

         if(!empty($message)){
            $key = '2A2B2C';
            $data = $message;
            $encrypted = aesEncrypt($data, $key);
            $query = "INSERT INTO messages ( incoming_msg_id, outgoing_msg_id, msg)
            VALUES ( {$incoming_id}, {$outgoing_id}, '{$encrypted}')";
            $result = mysqli_query($conn, $query);
         }
    }
    else{
        header("location: ./login.php");
    }
?>