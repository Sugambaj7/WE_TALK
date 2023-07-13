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
    <link rel="stylesheet" href="../assets/css/chats.css">
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
               <div>
                    <div class="flex flex-col ">
                        <div class = "border-b-2 flex flex-row">
                            <div>
                                <a href="./user_dashboard.php">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>
                            <div>
                               <img class="w-14 h-14 rounded-full" src="../assets/images/men.jpeg" alt="" srcset="">
                            </div>
                            <div class="flex flex-col">
                                <div> Sugam Bajracharya</div>
                                <div>Active now</div>
                            </div>
                        </div>
                        <div id="chatbox" class ="max-h-60 overflow-y-auto">
                            <div class="flex flex-row justify-between">
                                <div class="left-content">

                                </div>
                                <div class="flex flex-col">
                                    <div class="outgoing-text">
                                    <p class="py-2 px-5" >Hello! How are you?</p> 
                                    </div>
                                    <div class="flex flex-row">
                                        <div>
                                            <a href="#">Edit</a>
                                        </div>
                                        <div>
                                            |
                                        </div>
                                        <div>
                                            <a href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="flex flex-row ">
                                <div class="left-content flex justify-center items-center">
                                    <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="../assets/images/men.jpeg" alt="" srcset="">
                                </div>
                                <div class="incoming-text">
                                    <p class="py-2 px-5" >I am fine</p> 
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <div class="left-content">

                                </div>
                                <div class="flex flex-col">
                                    <div class="outgoing-text">
                                    <p class="py-2 px-5" >Hello! How are you?</p> 
                                    </div>
                                    <div class="flex flex-row">
                                        <div>
                                            <a href="#">Edit</a>
                                        </div>
                                        <div>
                                            |
                                        </div>
                                        <div>
                                            <a href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="flex flex-row ">
                                <div class="left-content flex justify-center items-center">
                                    <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="../assets/images/men.jpeg" alt="" srcset="">
                                </div>
                                <div class="incoming-text">
                                    <p class="py-2 px-5" >I am fine</p> 
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                    <div class="left-content">

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="outgoing-text">
                                        <p class="py-2 px-5" >Hello! How are you?</p> 
                                        </div>
                                        <div class="flex flex-row">
                                            <div>
                                                <a href="#">Edit</a>
                                            </div>
                                            <div>
                                                |
                                            </div>
                                            <div>
                                                <a href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row ">
                                    <div class="left-content flex justify-center items-center">
                                        <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="../assets/images/men.jpeg" alt="" srcset="">
                                    </div>
                                    <div class="incoming-text">
                                        <p class="py-2 px-5" >I am fine</p> 
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <div class="left-content">

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="outgoing-text">
                                        <p class="py-2 px-5" >Hello! How are you?</p> 
                                        </div>
                                        <div class="flex flex-row">
                                            <div>
                                                <a href="#">Edit</a>
                                            </div>
                                            <div>
                                                |
                                            </div>
                                            <div>
                                                <a href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row ">
                                    <div class="left-content flex justify-center items-center">
                                        <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="../assets/images/men.jpeg" alt="" srcset="">
                                    </div>
                                    <div class="incoming-text">
                                        <p class="py-2 px-5" >I am fine</p> 
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <div class="left-content">

                                    </div>
                                    <div class="flex flex-col">
                                        <div class="outgoing-text">
                                        <p class="py-2 px-5" >Hello! How are you?</p> 
                                        </div>
                                        <div class="flex flex-row">
                                            <div>
                                                <a href="#">Edit</a>
                                            </div>
                                            <div>
                                                |
                                            </div>
                                            <div>
                                                <a href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row ">
                                    <div class="left-content flex justify-center items-center">
                                        <img class="w-7 h-7 mx-auto my-auto rounded-full text-center" src="../assets/images/men.jpeg" alt="" srcset="">
                                    </div>
                                    <div class="incoming-text">
                                        <p class="py-2 px-5" >I am fine</p> 
                                    </div>
                                </div>
                            </div>    
                    </div>
                    <div>
                        <div class="mt-2 mb-2 ml-2 mr-2" >
                            <div class="flex flex-row">
                                <div class="flex justify-center items-center">
                                    <i class="fa-solid fa-circle-plus mx-auto my-auto pl-2 pr-2"></i>
                                </div>
                                <div>
                                    <input class="pt-1 pb-1 pl-4  border border-solid border-black" type="text" placeholder="Type a message here">
                                </div>
                                <div id="send-btn" class="flex justify-center items-center">
                                    <button>
                                        <i class="pl-2 pr-2 fa-solid fa-paper-plane mx-auto my-auto"></i>
                                    </button>
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
</body>
</html>