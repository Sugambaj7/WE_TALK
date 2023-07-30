<?php
    session_start();
    if(!isset($_SESSION['admin_unique_id']) && empty($_SESSION['admin_unique_id'])){
        header("Location: ./admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
    <title>Document</title>
</head>
<body>
    <div class="flex flex-row">
        <div class="mt-6 ml-6">
            <img src="./assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
        </div>
        <div class="flex justify-center items-center w-screen h-screen ">
            <div class="flex flex-row border border-solid border-black ">
                <div class="flex flex-row">
                    <div class="pt-3 pb-5 pr-5 pl-3 flex flex-col border-r border-solid border-black">
                        <div class="m-1">
                            <input class="feedback p-2 bg-blue-400 rounded text-white" type="button" value="View Feedback">
                        </div>
                        <div class="m-1">
                            <input class="delete_user p-2 bg-blue-400 rounded text-white" type="button" value="Delete User">
                        </div>
                        <div class="m-1 b">
                            <input class="update_psw p-2 bg-blue-400 rounded text-white" type="button" value="Update Password">
                        </div>
                        <div class="m-1  p-2 bg-blue-400 rounded text-white">
                            <a href="./admin_logout.php">Logout</a>
                        </div>
                    </div>
                    <div class="flex justify-center items-center content  border-l-0 border-solid border-black">
                        <h1 class="text-2xl ml-5 mr-5">Welcome to Admin Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <div>
           
        </div>
    </div>
    <script src="./assets/js/admin_dashboard_content.js"></script>
</body>
</html>