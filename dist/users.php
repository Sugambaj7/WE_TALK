<?php
    session_start();
    include '../connection/connection.php';

    $outgoing_id = $_SESSION['unique_id'];
 
    $query = "SELECT * FROM users_registration WHERE NOT unique_id = {$outgoing_id} AND delete_status = false ";// exclude self
    $result = mysqli_query($conn, $query);
    $output = "";

    if(mysqli_num_rows($result) == 0){
        $output .= "No users are available to chat";
    }
    else if(mysqli_num_rows($result) > 0){
        $key = '2A2B2C';
       include "data.php";
    }
    echo $output;
    ?>