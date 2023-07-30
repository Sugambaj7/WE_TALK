<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="m-4 flex flex-col">
        <div class="m-2 flex flex-col">
            <div>
                <h1 class="mt-4 underline text-xl">Delete Account Requests</h1>
            </div>
            <div class="del_account_request pt-1">
                <?php
                    include './connection/connection.php';
                    $status = true;
                    $query = "select * from delete_user where delete_status={$status}";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "You have a delete account request from". " " .$row['delete_user_email'] ."<br>";
                        }
                    }
                    else{
                         echo "No delete request till now";
                    }
                ?>
            </div>
        </div>
        <div class ="m-2 flex flex-col">
            <div class ="flex flex-col">
                <div>
                    <h1 class="underline text-xl">Existing Users</h1>
                </div>
                <div class="mt-3 flex flex-col">
                    <table class="border border-solid border-black">
                        <thead class="border-b border-solid border-black">
                            <tr>
                                <th class="p-2 border-r border-solid border-black">Id</th>
                                <th class="p-2 border-r border-solid border-black">User Email</th>
                                <th class="p-2">Delete</th>
                            </tr>
                        </thead>
                        <?php
                            $query2 = "select * from users_registration";
                            $result2 = mysqli_query($conn, $query2);
                            if(mysqli_num_rows($result2)>0){
                                while($row2 = mysqli_fetch_assoc($result2)){
                                    $user_datas[] = $row2; 
                                }
                            }
                            else{
                                $user_datas = array();
                            }
                        ?>


                        <?php 
                        foreach($user_datas as $user_data){
                        ?>
                        <tr class="border-b border-solid border-black">
                            <td class="p-2 border-r border-solid border-black">
                                
                                <?php 
                                    echo $user_data['user_id'];
                                ?>
                            </td>
                            <td class="p-2 border-r border-solid border-black"><?php echo $user_data['user_email'];?></td>
                            <td class="p-2 delete-user">
                                <div class="alert-admin">

                                </div>
                                <form action="./delete_user_process.php" method="POST">
                                    <input type="hidden" name="delete_user_email" value="<?php echo $user_data['user_email']?>"/>
                                    <input class="p-2 bg-blue-400 rounded text-white" id="delete-btn" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>