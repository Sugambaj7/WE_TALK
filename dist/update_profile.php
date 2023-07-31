<?php
    session_start();
    // if(!isset($_SESSION['unique_id'])){
    //     header("location: ./login.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="../assets/css/my_user_dashboard.css">
    <link rel="stylesheet" href="./fonts-6/css/all.css">
    <script src="https://kit.fontawesome.com/e3a0095685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
</head>
<body>
    <?php 
        include '../connection/connection.php';
        $query = "SELECT * FROM users_registration WHERE unique_id = {$_SESSION['unique_id']}";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
        }
        else{
            echo "No data found";
        }

    ?>
<div  class="whole-div flex flex-row">
        <div class="mt-6 ml-6">
            <img class="rounded-full" src="../assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
        </div>
        <div class=" flex justify-center items-center w-screen h-screen">
            <div class="signup border border-lid border-black" >
                <form class="px-12 py-12"  name="user_profile_update" method="POST" autocomplete="offgit" enctype="multipart/form-data">
                        <div class="flex flex-col justify-center items-center pb-8">
                            <div>
                                <h1 class="underline text-2xl">Edit Your Details</h1>
                            </div>

                            <div class="error-txt">
                                
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <label for="" >Name <span class="star text-red-500">*</span></label>
                            </div>
                            <div>
                                <input class="border  border-black w-56" type="text" name="update_user_name" required>
                                <span class="error_msg" id="name_Err" ></span>
                            </div>
                        </div>
                        <div>
                            <div> 
                                <label for="">Phone Number <span class="star text-red-500">*</span> </label>
                            </div>
                            <div>
                                <input class="border  border-black w-56" type="text" name="update_user_phn_num" required>
                                <span class="error_msg" id="phone_Err"></span>
                            </div>
                        </div>
                    
                        <div>
                            <div>
                                <label for="">Address <span class="star text-red-500">*</span></label>
                            </div>
                            <div>
                                <input class="border  border-black w-56" type="text" name="update_user_addr" required>
                                <span class="error_msg" id="user_address_Err"></span>
                            </div>
                        </div>
                        
                        <div>
                            <label for="">
                                Update Profile Picture<span class="star text-red-500">*</span>
                            </label>
                        </div>
                        <div>
                            <input type="file" name="img_upload" required>
                            <span class="error_msg" id="user_image_Err"></span>
                        </div>
                        <div class="button mt-2">
                            <input class=" border border-black w-56 py-0.5" type="submit" value="Update">
                        </div>
                </form>
            </div>
        </div>
        
        <div class="w-28">
        </div>

    </div>

</body>
</html>