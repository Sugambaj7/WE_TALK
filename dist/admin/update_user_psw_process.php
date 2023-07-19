<?php

    session_start();
    include './connection/connection.php';
    
    $update_user_email = mysqli_real_escape_string($conn, $_POST['update_user_email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    
    if(!isset($_SESSION['admin_unique_id']) && empty($_SESSION['admin_unique_id'])){
        header("location: ./admin_login.php");
    }
    else if(!empty($update_user_email) && !empty($new_password)){
        $query = "UPDATE users_registration SET user_password = '{$new_password}' WHERE user_email = '{$update_user_email}'";

        $result = mysqli_query($conn,$query);
        if($result){
            $query2 = "DELETE FROM update_password where user_email = '$update_user_email'";
            $result2 = mysqli_query($conn,$query2);
            if($result2){
                echo('<script type="text/javascript">alert("Password has been updated!");window.location=\'./admin_dashboard.php\';</script>)');
            }
            else{
                echo('<script type="text/javascript">alert("Unable to delete user!");window.location=\'./admin_dashboard.php\';</script>)');
            }
        }
        else{
            echo "Unable to delete user";
        }
    }
    else{
        echo "Update button need to be clicked";
    }
    
?>