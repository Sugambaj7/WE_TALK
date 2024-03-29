<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: ./user_dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
    <style>
        body{
            background-color: #F0F2F5;
        }
    </style>
</head>
<body>
    <div  class="whole-div flex flex-row">
        <div class="mt-6 ml-6">
            <img src="../assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
        </div>
        <div class=" flex justify-center items-center w-screen h-screen">
            <div class="signup border-2 rounded-md bg-white" >
                <form class="px-12 py-12"  name="user_register_form" method="POST" autocomplete="offgit" enctype="multipart/form-data">
                        <div class="flex flex-col justify-center items-center pb-8">
                            <div>
                                <h1 class="underline text-xl">Create Account</h1>
                            </div>
                            <div>
                                <span> user your email for registration</span>
                            </div>
                            <div class="error-txt text-red-500 text-sm pt-1">
                                
                            </div>
                        </div>
                        
                        <div class="mb-2">
                            <div class="mb-0.5">
                                <label class="text-lg" for="" >Name <span class="star text-red-500">*</span></label>
                            </div>
                            <div>
                                <input class="pl-3 border  border-black w-56" type="text" name="user_name" required>
                                <div class="name_Err text-red-500 text-sm"></div>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="mb-0.5"> 
                                <label class="text-lg" for="">Phone Number <span class="star text-red-500">*</span> </label>
                            </div>
                            <div>
                                <input class="border pl-3 border-black w-56" type="text" name="user_phn_num" required>
                                <div class="phone_Err text-red-500 text-sm"></div>
                            </div>
                        </div>
                    
                        <div  class="mt-1">
                            <div class="mb-0.5">
                                <label class="text-lg" for="">Address <span class="star text-red-500">*</span></label>
                            </div>
                            <div>
                                <input class="border pl-3 border-black w-56" type="text" name="user_addr" required>
                                <div class="address_Err text-red-500 text-sm"></div>
                            </div>
                        </div>
                        
                        <div  class="mt-1">
                            <div class="mb-0.5">
                                <label class="text-lg" for="">Email <span class="star text-red-500">*</span></label>
                            </div>
                            <div>
                                <input class="border pl-3 border-black w-56" type="text" name="user_email" required>
                                <div class="email_Err text-red-500 text-sm"></div>
                            </div>
                        </div>
                        
                        <div  class="mt-1">
                            <div class="mb-0.5">
                                <label class="text-lg" for="">Password <span class="star text-red-500">*</span></label>
                            </div>
                            <div>
                                <input class="border pl-3 border-black w-56" type="password" name="user_pass" required>
                                <div class="password_Err text-red-500 text-sm"></div>
                            </div>
                        </div>
                        
                        <div  class="mt-1">
                            <label class="text-lg" for="">
                                Select Image<span class="star text-red-500">*</span>
                            </label>
                        </div>
                        <div>
                            <input type="file" name="img_upload" required>
                            <span class="error_msg" id="user_image_Err"></span>
                        </div>
                        <div class="button mt-3">
                            <input style="background-color:#10B981;" class="pt-1 pb-1 border-1 w-56 py-0.5 text-white" type="submit" value="Continue to Chat">
                        </div>
                        <div class="mt-1">
                            <a href="./login.php" class="underline text-blue-700">Already signed up?Login</a>
                        </div>
                </form>
            </div>
        </div>
        
        <div class="w-28">
        </div>

    </div>
    <script src="./register.js"></script>
    
</body>
</html>