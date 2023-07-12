<?php

session_start();
include '../connection/connection.php';

$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$user_phn_num = mysqli_real_escape_string($conn, $_POST['user_phn_num']);
$user_addr = mysqli_real_escape_string($conn, $_POST['user_addr']);
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);

if(!empty($user_name) && !empty($user_phn_num)  && !empty($user_addr)  && !empty($user_email)  && !empty($user_pass) ){
    if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        $query = "SELECT user_email FROM users_registration WHERE user_email = '{$user_email}'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            echo "$user_email - has been previously used!";
    }
    else{
        if(isset($_FILES['img_upload'])){
            $image_name = $_FILES['img_upload']['name'];
            $image_type = $_FILES['img_upload']['type'];
            $tmp_name = $_FILES['img_upload']['tmp_name'];

            $image_explode = explode('.',$image_name);
            $image_ext = end($image_explode);

            $extensions = ['png','jpeg','jpg'];
            if(in_array($image_ext,$extensions) === true){
                $time = time();

                $new_image_name = $time.$image_name;
                if(move_uploaded_file($tmp_name,"uploads/user_image".$new_image_name)){
                    $status = "Active now";
                    $random_id = rand(time(),10000000);
                    $query2 = "INSERT INTO users_registration (unique_id, user_name, user_phone, user_address, user_email, user_password, user_image, status) VALUES('{$random_id}', '{$user_name}', '{$user_phn_num}', '{$user_addr}', '{$user_email}', '{$user_pass}', '{$new_image_name}', '{$status}')";

                    $result2 = mysqli_query($conn, $query2);
                    
                    if($result2){
                        $sql3 = mysqli_query($conn, "SELECT * FROM users_registration WHERE user_email = '{$user_email}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo "success";
                        }
                        else{
                            echo "This email address not Exist!";
                        }
                    }
                    else{
                        echo "Something went wrong!";
                    }
                }
            }else{
                echo "Valid formats : png, jpeg, jpg";
            }


        }else{
            echo "Please select an image file";
        }
        }
    }
    else{
        echo "$user_email - This is not a valid email";
    }
}else{
    echo "All input fields are required";
}
?>