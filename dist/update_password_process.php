<?php 
   
   session_start();
   include '../connection/connection.php';
   $update_user_email = mysqli_real_escape_string($conn, $_POST['update_user_email']);
   $updated_password = mysqli_real_escape_string($conn, $_POST['updated_password']);

   if(isset($_SESSION['unique_id']) && !empty($_SESSION['unique_id'])){
      if(!empty($update_user_email) && !empty($updated_password)){
         $query = "SELECT * FROM update_password WHERE user_email = '$update_user_email'";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
            echo "You have already requested a new password!" . "<br>" ."Your password will soon be updated";
         }
         else{
            $update_password_status = true;
            $query2 = "INSERT INTO update_password(user_email,new_password,update_psw_status) VALUES ('$update_user_email', '$updated_password', '$update_password_status')";
            $result2 = mysqli_query($conn,$query2);
            if($result2){
               echo "Successfully requested to update the password";
            }
            else{
               echo "Unable to request to update the password";
            }
         }
      }
      else{
         echo "Updated password cannot be empty!";
      }
  }
  else{
      header("location: ./login.php");
  }
?>