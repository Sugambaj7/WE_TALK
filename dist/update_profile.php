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
            <div class="update_form border border-l border-black" >
                <div class="flex flex-col ml-10 mt-10 mb-10 mr-10">
                    <div class="flex justify-center items-center mb-9">
                        <div class="flex flex-col">
                            <div class="flex justify-center items-center">
                                <h1 class="underline text-2xl">Edit Your Profile</h1>
                            </div>
                            <div class="error-txt mt-2">
                                
                            </div>
                        </div>
                    </div>
                        <div class="update_name mb-2">
                            <form action="" method="post">
                                <div class="flex flex-row">
                                    <div class="mr-1 w-28">
                                        <label for="">Name</label>
                                    </div>
                                    <div class="ml-3">
                                        <input class="border border-solid border-black w-56 h-8" name="update_user_name" type="text">
                                    </div>
                                    <div class="button ml-1">
                                        <input type="button" class=" bg-blue-400 rounded text-white h-8 text-sm pl-2 pr-2" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class= "update_phone mb-2">
                            <form action="" method="post">
                                <div class="flex flex-row">
                                    <div class="mr-1 w-28">
                                        <label for="">Phone Number</label>
                                    </div>
                                    <div class="ml-3">
                                        <input class="border border-solid border-black w-56 h-8" name="update_user_phn_num" type="text">
                                    </div>
                                    <div class="button ml-1">
                                        <input type="button" class=" bg-blue-400 rounded text-white h-8 text-sm pl-2 pr-2" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="update_addr mb-2">
                            <form action="" method="post">
                                <div class="flex flex-row">
                                    <div class="mr-1 w-28">
                                        <label for="">Address</label>
                                    </div>
                                    <div >
                                        <input class="border border-solid border-black ml-3 w-56 h-8" name="update_user_addr" type="text">
                                    </div>
                                    <div class="button ml-1">
                                        <input type="button" class=" bg-blue-400 rounded text-white h-8 text-sm pl-2 pr-2" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="update_image">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="flex flex-col">
                                    <div class="mr-1">
                                        <label for="">Select Image:</label>
                                    </div>
                                    <div class="flex flex-row mt-3">
                                        <div class="w-80">
                                            <input type="file" name="img_upload" >
                                            <input type="hidden" name="old_img_name" value="<?php echo $row['user_image'];?>">
                                        </div>
                                        <div  class="button ml-1">
                                            <input type="button" class="ml-8 bg-blue-400 rounded text-white h-8 text-sm pl-2 pr-2" value="Update">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="w-28">
        </div>

    </div>
    <script src="./update_profile.js"></script>
</body>
</html>