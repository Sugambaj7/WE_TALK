<?php
    session_start();
    include '../connection/connection.php';

    $outgoing_id = $_SESSION['unique_id'];
    $query = "SELECT * FROM users_registration WHERE NOT unique_id = {$outgoing_id} ";
    $result = mysqli_query($conn, $query);
    $output = "";

    if(mysqli_num_rows($result) == 1){
        $output .= "No users are available to chat";
    }
    else if(mysqli_num_rows($result) > 0){
       include "data.php";
    }
    echo $output;
    ?>