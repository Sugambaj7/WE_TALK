<?php
    session_start();
    include '../connection/connection.php';

    
    $keyword = mysqli_real_escape_string($conn, $_POST['searchTerm']);


    function aesDecrypt($encryptedData, $key)
    {
        $encryptedData = base64_decode($encryptedData);
        $iv = substr($encryptedData, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $iv = str_pad($iv, 16, "\0");
        $encryptedData = substr($encryptedData, openssl_cipher_iv_length('aes-256-cbc'));
        $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return $decryptedData;
    }

    function linearSearch($keyword,$data){
        $outgoing_id = $_SESSION['unique_id'];//use for dynamic message viewing
        $found = false;
        for($i=0;$i<count($data);$i++){
            if($data[$i] == $keyword){
                $found = true;
               if($found == true){//verified that keyword email exist
                include '../connection/connection.php';
                $query2 = "select * from users_registration where user_email = '{$keyword}'";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2)>0){
                    $row2 = mysqli_fetch_assoc($result2);// keyword related all datas like image username etc
                    $searched_user_unique_id = $row2['unique_id'];
                    
                    //for showing dynamic message while searching after knowing searched user id
                    $query3 = "SELECT * FROM messages WHERE (incoming_msg_id =  $searched_user_unique_id && outgoing_msg_id = $outgoing_id) ORDER BY msg_id DESC";
                    $result3 = mysqli_query($conn, $query3);

                        if(mysqli_num_rows($result3)<1){
                            $output .= "No messages";
                        }
                        else if(mysqli_num_rows($result3) > 0){
                                    $row3 = mysqli_fetch_assoc($result3);
                                    $encryptedlastmsg = $row3['msg'];
                                    $key='2A2B2C';
                                    $decryptedMsg = aesDecrypt($encryptedlastmsg, $key);
                        }
                        else{
                            $lastmsg = "No message available";
                        }

                                (strlen($decryptedMsg)>28) ? $msg = substr($decryptedMsg, 0, 28).'....' : $msg = $decryptedMsg;
                                ($outgoing_id == $row3['outgoing_msg_id']) ? $you = "You: " : $you = " ";


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
               }
                break;
            }
        }
        if($found == false){
            echo "This user doesnot exitst";
        }
        else{
            echo $output;
        }
    }



    //start
    $query = "select user_email from users_registration";
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