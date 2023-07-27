<?php
    session_start();
    include '../connection/connection.php';

    
    $keyword = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $self_email = $_SESSION['self_email'];


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
        $self_email = $_SESSION['self_email'];
        $outgoing_id = $_SESSION['unique_id'];//use for dynamic message viewing
        $found = false;
        for($i=0;$i<count($data);$i++){
            if($data[$i] == $keyword){
                $found = true;
               if($found == true){//verified that keyword email exist
                include '../connection/connection.php';
                //already excluded self
                $query2 = "select * from users_registration where user_email = '{$keyword}'";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2)>0){
                    $row2 = mysqli_fetch_assoc($result2);// keyword related all datas like image username etc
                    $searched_user_unique_id = $row2['unique_id'];
                    
                    //for showing dynamic message while searching after knowing searched user id
                    $query3 = "SELECT * FROM messages WHERE (incoming_msg_id =  $searched_user_unique_id && outgoing_msg_id = $outgoing_id) ORDER BY msg_id DESC";
                    $result3 = mysqli_query($conn, $query3);

                        if(mysqli_num_rows($result3)<1){
                            $output="";
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
                                if(!empty($decryptedMsg) && !empty($row3['outgoing_msg_id'])){
                                    (strlen($decryptedMsg)>28) ? $msg = substr($decryptedMsg, 0, 28).'....' : $msg = $decryptedMsg;
                                ($outgoing_id == $row3['outgoing_msg_id']) ? $you = "You: " : $you = " ";
                                }
                                else{
                                    $you = "You: ";
                                    $msg = "No message available";
                                }


                        $output = "";
                        $output.='<div class="ml-2.5 mt-2 mb-1">
                                    <a href="chats.php?user_id='.$row2['unique_id'].'">
                                        <div class="flex flex-row">
                                                <div class="flex items-center w-11 h-11 mt-1 border border-solid border-black rounded-full overflow-hidden">
                                                    <img  class="p-1"  src="./uploads/user_image/'. $row2['user_image'] . '"  alt="">
                                                </div>
                                                <div class="flex flex-col ml-4">
                                                    <div>
                                                    <span>'.$row2['user_name'].'</span>
                                                    </div>
                                                    <div>
                                                        <p>'. $you . $msg .'</p>
                                                    </div>
                                                </div>
                                                <div class="circle-div ml-60 text-xs">
                                                    <div class="'.$row2['status'].'">
                                                        <i class="fas fa-circle"></i>
                                                    </div>
                                                 </div>
                                            </div>
                                    </a>
                                </div>';
                    }
               }
                break;
            }
        }
        if($self_email == $keyword){
            echo "You cannot search yourself";
        }
        else if($found == false){
            echo "The user doesnot exist";
        }
        else{
            echo $output;
        }
    }



    //start
    $query = "SELECT user_email from users_registration WHERE NOT user_email = '$self_email' ";
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