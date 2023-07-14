<?php
    session_start();
    include '../connection/connection.php';
    
    $keyword = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $outgoing_id = $_SESSION['unique_id'];

    function linearSearch($keyword,$data){
        $outgoing_id = $_SESSION['unique_id'];//use for dynamic message viewing
        $found = false;
        for($i=0;$i<count($data);$i++){
            if($data[$i] == $keyword){
                $found = true;
               if($found == true){//verified that keyword email exist
                include '../connection/connection.php';
                $query2 = "select * from users_registration where user_email = '{$keyword} 'AND unique_id <> {$outgoing_id}";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2)>0){
                    $row2 = mysqli_fetch_assoc($result2);// keyword related all datas like image username etc will be used later to display user information

                    //for showing dynamic message while searching with knowing who sends
                    $query3 = "SELECT * FROM users_registration ";
                    $result3 = mysqli_query($conn, $query3);

                        if(mysqli_num_rows($result3) == 1){
                            $output .= "No users are available to chat";
                        }
                        else if(mysqli_num_rows($result3) > 0){
                            while($row3 = mysqli_fetch_assoc($result3)){//all users data except keyword related
                                    $query4 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row3['unique_id']} OR outgoing_msg_id = {$row3['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
                                    $result4 = mysqli_query($conn, $query4);
                                    $row4 = mysqli_fetch_assoc($result4);
                                if(mysqli_num_rows($result4)>0){
                                    $lastmsg = $row4['msg'];
                                }
                                else{
                                    $lastmsg = "No message available";
                                }

                                (strlen($lastmsg)>28) ? $msg = substr($lastmsg, 0, 28).'....' : $msg = $lastmsg;
                                ($outgoing_id == $row4['outgoing_msg_id']) ? $you = "You: " : $you = " ";


                                $output = "";
                                $output.='<div>
                                            <a href="chats.php?user_id='.$row2['unique_id'].'">
                                                <div class="flex flex-row">
                                                        <div class="w-10 h-10 border border-solid border-black">
                                                            <img src="./uploads/user_image/'. $row2['user_image'] . '"  alt="">
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <div>
                                                            <span>'.$row2['user_name'].'</span>
                                                            </div>
                                                            <div>
                                                                <p>'. $you . $msg .'</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-circle"></i>
                                                        </div>
                                                    </div>
                                            </a>
                                        </div>';
                                }
                            }//
                    
                    }
               }
                break;
            }
        }
        if($found == false){
            echo "This user doesnot exitst";
        }
        else if(mysqli_num_rows($result2) < 1 AND $found == true){
            echo "Sorry! It's your own id";
        }
        else{
            echo $output;
        }
    }



    //start
    $query = "select user_email from users_registration ";
    $result = mysqli_query($conn, $query);
    $data = array();
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
                $data[] = $row['user_email'];
        }
    }
    else{
        echo "No user_email created till now";
    }

    $isfound = linearSearch($keyword, $data);


?>