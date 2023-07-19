<?php 
   
   session_start();
   include '../connection/connection.php';
   $self_user_email = mysqli_real_escape_string($conn, $_POST['self_user_email']);
   $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

   if(isset($_SESSION['unique_id']) && !empty($_SESSION['unique_id'])){
      if(!empty($self_user_email) && !empty($feedback)){
         $query = "SELECT * FROM feedback WHERE user_email = '$self_user_email'";
         $result = mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
            echo "You have already given your feedback!" . "<br>" ."Your feedback has been noticed!";
         }
         else{
            $query2 = "INSERT INTO feedback(user_email,feedback) VALUES ('$self_user_email', '$feedback')";
            $result2 = mysqli_query($conn,$query2);
            if($result2){
               echo "Your feedback has been recorded!" . "<br>" ."Thank you for your feedback";
            }
            else{
               echo "Unable to send feedback";
            }
         }
      }
      else{
         echo "Feedback cannot be empty!";
      }
  }
  else{
      header("location: ./login.php");
  }
?>