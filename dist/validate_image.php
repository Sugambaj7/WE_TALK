<?php

session_start();
include '../connection/connection.php';

$old_user_image = mysqli_real_escape_string($conn, $_POST['old_img_name']);


if(!empty($_FILES['img_upload']['name'])){
        if(isset($_FILES['img_upload'])){
            $image_name = $_FILES['img_upload']['name'];
            $image_type = $_FILES['img_upload']['type'];
            $tmp_name = $_FILES['img_upload']['tmp_name'];

            $image_explode = explode('.',$image_name);
            $image_ext = end($image_explode);

            $extensions = ['png','jpeg','jpg','PNG','JPEG','JPG'];
            if(in_array($image_ext,$extensions) === true){
                $time = time();
                $new_image_name = $time.$image_name;
                if(move_uploaded_file($tmp_name,"./uploads/user_image/".$new_image_name)){
                    $random_id = rand(time(),10000000);
                    $query6 = "UPDATE users_registration SET user_image = '{$new_image_name}' WHERE unique_id = '{$_SESSION['unique_id']}'";
                    $result6 = mysqli_query($conn, $query6);
                    echo "success";
                }
            }else{
                echo "Valid formats for image: png, jpeg, jpg";
            }

        }
    }
else{
    echo "Please select an image file";
}
?>