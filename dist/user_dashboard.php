<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: ./login.php");
    }
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
            <div class="flex flex-row">
                <div class="border border-solid border-black" >
                    <div class="user_dashboard">
                        <div class="site-users flex flex-col">
                            <div class="flex flex-row mt-3 ml-3 mb-1">
                                <div class="border border-solid border-black rounded-full overflow-hidden">
                                    <img class="p-2 w-14 h-14"  src="./uploads/user_image/<?php echo $row["user_image"]?>" alt="" srcset="">
                                </div>
                                <div class="flex flex-col ml-8">
                                    <div>
                                    <?php echo $row['user_name'] ?>
                                    </div>
                                    <div class="text-xs">
                                        <?php echo $row['status'] ?>
                                    </div>
                                </div>
                                <div class="ml-16 mt-1">
                                    <a href="logout.php?logout_id=<?php echo $row['unique_id']?>">Logout</a>
                                </div>
                            </div>
                            <div>
                                ______________________________________________________
                            </div>
                            <div class="flex flex-col">
                                <div class="ml-3">
                                    Select or Search user to start a chat
                                </div>
                                <div id="search-content" class=" flex flex-row mt-3 ml-2 mr-3">
                                    <div id="search-bar-div">
                                        <?php
                                        //for excluding self from search
                                         $_SESSION['self_email']  =  $row['user_email'];
                                         ?>
                                        <input id="keyword" class="border border-solid border-black outline-none pl-2" type="text" placeholder="Enter a name to search">
                                    </div>
                                    <div class="flex justify-center items-center" id="search-btn">
                                        <button>
                                            <i class="fa-solid fa-magnifying-glass text-center h-5 w-10"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="users-list" class="mt-4 mb-3 flex flex-col max-h-60 overflow-y-auto">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col border border-solid border-black">
                    <div class="ml-4 mr-4 mt-2">
                    <div class="mb-1">
                            <a href="update_profile.php">Update Profile</a>
                        </div>
                        <div class="mb-1">
                            <a href="feedback.php">Feedback</a>
                        </div>
                        <div class="mb-1">
                            <a href="req_update_password.php">Update Password</a>
                        </div>
                        <div class="delete-section">
                            <div class="flex flex-col">
                                <div class="error-txt">
                                </div>
                                <div>
                                    <form action="" method="POST">
                                        <input type="text" hidden name="delete_user_email" value="<?php echo $row['user_email'];?>" />
                                        <input id="del-btn" type="button" value="Delete Account">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="w-28">
        </div>

    </div>
    <script src="./users.js"></script>
    <script src="./delete_user.js"></script>

</body>
</html>