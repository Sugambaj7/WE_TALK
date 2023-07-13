<?php
    session_start();
    include '../connection/connection.php';

    $query = "SELECT * FROM users_registration";
    $result = mysqli_query($conn, $query);
    $output = "";

    if(mysqli_num_rows($result) == 1){
        $output .= "No users are available to chat";
    }
    else if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
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
                                            <p>This is a test message</p>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fas fa-circle"></i>
                                    </div>
                                </div>
                        </a>
                    </div>';
        }
    }
    echo $output;
    ?>