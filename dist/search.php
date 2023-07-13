<?php

    include '../connection/connection.php';
    $keyword = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    function linearSearch($keyword,$data){
        $found = false;
        for($i=0;$i<count($data);$i++){
            if($data[$i] == $keyword){
                $found = true;
               if($found == true){
                include '../connection/connection.php';
                $query2 = "select * from users_registration where user_email = '{$keyword}'";
                $result2 = mysqli_query($conn, $query2);
                if(mysqli_num_rows($result2)>0){
                    $row2 = mysqli_fetch_assoc($result2);
                    $output = "";
                    $output.='<div>
                        <a href="">
                            <div class="flex flex-row">
                                    <div class="w-10 h-10 border border-solid border-black">
                                        <img src="./uploads/user_image/'. $row2['user_image'] . '"  alt="">
                                    </div>
                                    <div class="flex flex-col">
                                        <div>
                                           <span>'.$row2['user_name'].'</span>
                                        </div>
                                        <div>
                                            <p>eThis is a test messag</p>
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

    $query = "select user_email from users_registration";
    $result = mysqli_query($conn, $query);
    $data = array();
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row['user_email'];
        }
    }
    else{
        echo "No data found";
    }

    $isfound = linearSearch($keyword, $data);
    // if ($isfound == true) {
    //     // Display all information related to the search key
       
    //     echo "Sacchai hota";
    // } else {
    //     // Search key not found
    //     echo "Search key not found.";
    // }

?>