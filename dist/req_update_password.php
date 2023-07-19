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
        
        <div class="flex justify-center items-center w-screen h-screen">
            <div class="border border-lid border-black">
                <div class="my-form mt-10 mb-10 mr-10 ml-10">
                    <form action="" method="POST" name="password-form">
                        <div class="flex flex-col justify-center items-center">
                            <div>
                                <h1 class="text-2xl">Enter New Password</h1>
                            </div>

                            <div class="err-txt">

                            </div>
                            <div class="mt-5">
                                <input class="border  border-black w-56 h-10 pl-2" type="password" name="updated_password" required >
                            </div>
                            <div class="button mt-2">
                                <input  type="text" hidden name="update_user_email" value="<?php echo $row['user_email']; ?>">
                                <input id="submit-btn" class=" border border-black w-40 py-1" type="button" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-28">

        </div>

    </div>
    <script src="./update_password.js"></script>
    
</body>
</html>