<?php

session_start();
include '../connection/connection.php';

$new_user_addr = mysqli_real_escape_string($conn, $_POST['update_user_addr']);

$new_user_addr_pattern =  '/^[A-Za-z]{4,10},[A-Za-z]{4,10}$/';


if(!empty($new_user_addr)){
    if(preg_match($new_user_addr_pattern, $new_user_addr)){
        $query5 = "UPDATE users_registration SET user_address = '{$new_user_addr}' WHERE unique_id = '{$_SESSION['unique_id']}'";
        $result5 = mysqli_query($conn, $query5);
        echo "sucsess";
    }
    else{
        echo "Address must be in format : word,word";
    }

}
else{
    echo "Please enter address!";
}
?>