<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "WE-TALK";

   $conn = mysqli_connect($server,$username,$password,$db_name);

    if(!$conn){
        die("Sorry failed to connect");
    }
