<?php
    session_start();
    if(!isset($_SESSION['unique_id']) && empty($_SESSION['unique_id'])){
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
</head>
<body>
    <?php
        include '../connection/connection.php';
        if(isset($_GET['edit_msg_unique_id'])){
                $edit_msg_unique_id = (int)$_GET['edit_msg_unique_id'];
        }
    ?>
    <div  class="whole-div flex flex-row">
        <div class="mt-6 ml-6">
            <img src="../assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
        </div>
        
        <div class="flex justify-center items-center w-screen h-screen">
            <div class="border border-lid border-black">
                <div class="my-form mt-10 mb-10 mr-10 ml-10">
                    <form action="" method="POST" name="edit-form">
                        <div class="flex flex-col justify-center items-center">
                            <div>
                                <h1 class="text-2xl">Enter a text to update existing text</h1>
                            </div>
                            <div class="mt-5">
                                <input class="border  border-black w-56 h-10 pl-2" type="text" name="updated-text" required>
                            </div>
                            <div class="button mt-2">
                                <input type="text" hidden name="edit_msg_unique_id" value="<?php echo $edit_msg_unique_id;?>">
                                <input id="submit" class=" border border-black w-40 py-1" type="submit" value="Edit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-28">

        </div>

    </div>
    <script src="editmsg.js"></script>
    
</body>
</html>