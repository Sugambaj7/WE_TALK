<?php
    if(!isset($_SESSION['admin_unique_id']) && empty($_SESSION['admin_unique_id'])){
        header("location: ./admin_login.php");
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
                <div class="flex flex-row mt-10 mb-10 ml-10 mr-10">
                    <div class="flex flex-col  border border-solid border-black">
                        <div>
                            <input class="feedback" type="button" value="View Feedback">
                        </div>
                        <div>
                            <input class="delete_user" type="button" value="Delete User">
                        </div>
                        <div>
                            <input class="update_psw" type="button" value="Update Password">
                        </div>
                        <div>
                            <a href="./admin_logout.php">Logout</a>
                        </div>
                    </div>
                    <div class="content border border-solid border-black">
                        Welcome to Admin Dashboard
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