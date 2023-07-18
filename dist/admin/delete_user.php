<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="flex flex-col">
        <div class="flex flex-col">
            <div>
                <h1>Delete Account Requests</h1>
            </div>
            <div class="del_account_request">
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
        <div class ="flex flex-col">
            <div class ="flex flex-col">
                <div>
                    Existing Users
                </div>
                <div class="flex flex-col">
                <table class="border border-solid border-black">
                        <thead class="border-b border-solid border-black">
                            <tr>
                                <th class="border-r border-solid border-black">Id</th>
                                <th class="border-r border-solid border-black">User Email</th>
                                <th>Delete</th>
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
                                $user_datas[] ="No user data found";
                            }
                        ?>

                        <?php 
                        foreach($user_datas as $user_data){
                        ?>
                        <tr class="border-b border-solid border-black">
                            <td class="border-r border-solid border-black"><?php echo $user_data['user_id'];?></td>
                            <td class="border-r border-solid border-black"><?php echo $user_data['user_email'];?></td>
                            <td class="delete-user">
                                <form action="" method="POST">
                                    <input type="text" hidden name="delete_user_email" value="<?php echo $row['delete_user_email']?>"/>
                                    <input type="button" value="Delete">
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