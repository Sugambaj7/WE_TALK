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
            <div class="flex flex-col border border-solid border-black">
                <div class="border-b border-solid border-black">
                    <div class="flex flex-row m-3">
                        <div class="border border-solid border-black rounded-full overflow-hidden">
                            <img class="w-14 h-14"  src="./uploads/user_image/<?php echo $row["user_image"]?>" alt="" srcset="">
                        </div>
                        <div class="flex justify-center items-center ml-5 mr-10">
                            <h1 class="text-2xl"><?php echo $row['user_name']."'s" ?> Profile</h1>
                        </div>
                    </div>
                </div>
                <div class="m-5">
                    <table>
                        <tr>
                            <th class="flex justify-start w-48 font-normal pb-3">
                                <h1 class="text-xl">Name</h1>
                            </th>
                            <td class="text-xl pb-3 pl-5">
                                <?php echo $row['user_name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="flex justify-start w-48 pb-3 font-normal">
                                <h1 class="text-xl">Phone Number</h1>
                            </th>
                            <td class="text-xl pb-3 pl-5">
                                <?php echo $row['user_phone'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="flex justify-start w-48 pb-3 font-normal">
                                <h1 class="text-xl">Address</h1>
                            </th>
                            <td class="text-xl pb-3 pl-5">
                                <?php echo $row['user_address'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="flex justify-start w-48 pb-3 font-normal">
                                <h1 class="text-xl">Email</h1>
                            </th>
                            <td class="text-xl pb-3 pl-5">
                                <?php echo $row['user_email'] ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="w-28">
        </div>

    </div>
</body>
</html>