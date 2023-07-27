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
    <script src="https://kit.fontawesome.com/e3a0095685.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/all_chats.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
</head>
<body>
  <?php 
        include '../connection/connection.php';
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $query = "SELECT * FROM users_registration WHERE unique_id = {$user_id}";//main source for differnt user
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['chat_garne_user_id'] = $row['unique_id'];
        }
    ?>
    <div class="whole-div flex flex-row">
        <div class="mt-6 ml-6">
            <img src="../assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
        </div>
        <div class=" flex justify-center items-center w-screen h-screen">
            <div class="border border-solid border-black" >
               <div>
                    <div class="user-chat-area flex flex-col ">
                        <div class = "border-b-2 mt-2 flex flex-row">
                            <div class="ml-4 mr-2">
                                <a href="./user_dashboard.php">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>
                            <div class="flex items-center w-11 h-11 ml-4 border border-solid border-black rounded-full overflow-hidden">
                               <img class="p-1 w-14 h-14" src="./uploads/user_image/<?php echo $row['user_image']?>" alt="" srcset="">
                            </div>
                            <div class="flex flex-col ml-8 mr-32 mb-3">
                                <div class="text-xl">
                                     <?php
                                        echo $row['user_name'];
                                     ?>
                                </div>
                                <div class="text-xs">
                                    <?php
                                        echo $row['status'];
                                     ?>
                                </div>
                            </div>
                        </div>
                        <div id="chatbox" class ="max-h-60 overflow-y-auto">
                       
                        </div>
                        <div>
                            <div class="mt-2 mb-2 ml-2 mr-2" >
                                <div class="flex flex-row">
                                    <!-- <div class="flex justify-center items-center">
                                        <i class="fa-solid fa-circle-plus mx-auto my-auto pl-2 pr-2"></i>
                                    </div> -->
                                    <div>
                                        <form action="" class="msg-textbox flex flex-row">
                                            <input type="text" hidden name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>" />
                                            <input type="text" hidden name="incoming_id" value="<?php echo $user_id;?>" />
                                            <input class="input-field w-72 pt-1 pb-1 pl-4  border border-solid border-black" type="text" name="message" placeholder="Type a message here">
                                            <div id="send-btn" class="flex justify-center items-center">
                                                <button>
                                                    <i class="pl-2 pr-2 fa-solid fa-paper-plane mx-auto my-auto"></i>
                                                </button>
                                            </div>
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
    <script src="./chats.js"></script>
</body>
</html>