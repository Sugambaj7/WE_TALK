<?php

session_start();
include '../connection/connection.php';


$usernameErr = $phoneErr = $addrErr = $passwordErr = $emailErr = false; 

function validate_username($user_name){
    $username_pattern = "/^[A-Z][a-z]{2,20}/";
    if(preg_match($username_pattern,$user_name)){
        return true;
    }
    else{
        return false;
    }
}

function validate_user_phn_num($user_phn_num){
    $phone_pattern = "/^[9][6-8]{1}[0-9]{8}/";
    if(preg_match($phone_pattern,$user_phn_num)){
        return true;
    }
    else{
        return false;
    }
}

function validate_address($user_addr){
    $address_pattern = "/^[a-zA-Z]{2,15}(,[a-zA-Z]{2,15})?$/";
    if(preg_match($address_pattern,$user_addr)){
        return true;
    }
    else{
        return false;
    }
}

function validate_Email($user_email){
    $email_pattern = "/[a-z]{5,10}@gmail\.com$/";
    if(preg_match($email_pattern,$user_email)){
        return true;
    }
    else{
        return false;
    }
}

function validate_password($user_pass){
    $password_pattern = "/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,10}$/";
    if(preg_match($password_pattern,$user_pass)){
        return true;
    }
    else{
        return false;
    }
}

$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$user_phn_num = mysqli_real_escape_string($conn, $_POST['user_phn_num']);
$user_addr = mysqli_real_escape_string($conn, $_POST['user_addr']);
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_pass = mysqli_real_escape_string($conn, $_POST['user_pass']);



if(!empty($user_name) && !empty($user_phn_num)  && !empty($user_addr)  && !empty($user_email)  && !empty($user_pass) ){
    //check user name valid or not
    if(validate_username($user_name)){
        $usernameErr = false;
    }
    else{
        $usernameErr = true;
        echo "Name must be between 3 and 20 and start with capital letter!";
    }
    
    //check user phone number valid or not
    if(strlen($user_phn_num) == 10){
        $phoneErr = false;
    }
    else{
        $phoneErr = true;
        echo "Phone number must be 10 digits!";
    }

    if(validate_user_phn_num($user_phn_num)){
        $phoneErr = false;
    }
    else{
        $phoneErr = true;
        echo "Phone number must start with 96 or 97 or 98!";
    }

    if(validate_address($user_addr)){
        $addrErr = false;
    }
    else{
        $addrErr = true;
        echo "Address must be in format: *** or ***,***";
    }

    if(validate_Email($user_email)){
        $emailErr = false;
    }
    else{
        $emailErr = true;
        echo "Email must be in format: *****@gmail.com";
    }

    if(validate_password($user_pass)){
        $passwordErr = false;
    }
    else{
        $passwordErr = true;
        echo "Password must contain atleast one number, one special character and must be between 7 and 10 characters!";
    }


    if($usernameErr == false && $phoneErr == false && $addrErr == false && $emailErr == false && $passwordErr == false){
        
        if(filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $query = "SELECT * FROM users_registration WHERE user_email = '{$user_email}'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) > 0){
                echo "Email has been previously used!";
            }
        else{
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
            echo "This is not a valid email";
        }
    }
    
}else{
    echo "All input fields are required";
}
?>