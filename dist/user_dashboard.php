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
    <link rel="stylesheet" href="../assets/css/usserr-ddashboard.css">
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
            <img src="../assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
        </div>
        <div class=" flex justify-center items-center w-screen h-screen">
            <div class="border border-solid border-black" >
                <div class="user_dashboard">
                    <div class="site-users flex flex-col">
                        <div class="flex flex-row">
                            <div>
                                <img class="w-14 h-14 rounded-full"  src="./uploads/user_image/<?php echo $row["user_image"]?>" alt="" srcset="">
                            </div>
                            <div class="flex flex-col">
                                <div>
                                   <?php echo $row['user_name'] ?>
                                </div>
                                <div>
                                    <?php echo $row['status'] ?>
                                </div>
                            </div>
                            <div>
                                logout
                            </div>
                        </div>
                        <div>
                            ______________________________________________________
                        </div>
                        <div class="flex flex-col">
                            <div>
                                Select or Search user to start a chat
                            </div>
                            <div id="search-content" class=" flex flex-row">
                                <div id="search-bar-div">
                                    <input class="border border-solid border-black outline-none" type="text" placeholder="Enter a name to search">
                                </div>
                                <div class="bg-green-400 flex justify-center items-center" id="search-btn">
                                    <button>
                                        <i class="fa-solid fa-magnifying-glass text-center h-5 w-10"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="users-list" class=" flex flex-col max-h-60 overflow-y-auto">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="w-28">
        </div>

    </div>
    <script src="./users.js"></script>
</body>
</html>