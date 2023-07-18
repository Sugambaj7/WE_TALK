<?php

    session_start();
    include './connection/connection.php';
    
    $delete_user_email = mysqli_real_escape_string($conn, $_POST['delete_user_email']);
    
    if(!isset($_SESSION['admin_unique_id']) && empty($_SESSION['admin_unique_id'])){
        header("location: ./admin_login.php");
    }
    else if(!empty($delete_user_email)){
        $query = "DELETE FROM users_registration where user_email = '$delete_user_email'";
        $result = mysqli_query($conn,$query);
        if($result){
            $query2 = "DELETE FROM delete_user where delete_user_email = '$delete_user_email'";
            $result2 = mysqli_query($conn,$query2);
            if($result2){
                echo('<script type="text/javascript">alert("User has been deleted!");window.location=\'./admin_dashboard.php\';</script>)');
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
        echo "Delete button need to be clicked";
    }
    
?>