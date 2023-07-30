<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="ml-4 mr-4 mb-4 mt-0 flex flex-col">
        <div class="flex flex-col">
            <div>
                <h1 class="underline text-xl">Password Update Requests</h1>
            </div>
            <div class="pt-1 psw_account_request">
                <?php
                    include './connection/connection.php';
                    $password_update_status = true;
                    $query = "select * from update_password where update_psw_status={$password_update_status}";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            // echo $row['new_password'];
                            $update_psw_user_details[] = $row; 
                            echo "You have an update password request from". " " .$row['user_email'] ."<br>";
                        }
                    }
                    else{
                        $update_psw_user_details = array();
                         echo "No update password request till now";
                    }
                ?>
            </div>
        </div>
        <div class ="mt-4 flex flex-col">
            <div class ="flex flex-col">
                <div>
                   <h1 class="mt-3 underline text-xl">Users to update password</h1> 
                </div>
                <div class="mt-3 flex flex-col">
                <table class="border border-solid border-black">
                        <thead class="border-b border-solid border-black">
                            <tr>
                                <th class="p-2 border-r border-solid border-black">Id</th>
                                <th class="p-2 border-r border-solid border-black">User Email</th>
                                <th class="p-2" >Update</th>
                            </tr>
                        </thead>


                        <?php 
                        foreach($update_psw_user_details as $update_psw_user_detail){
                        ?>
                        <tr class="border-b border-solid border-black">
                            <td class="p-2  border-r border-solid border-black">
                                <?php 
                                    echo $update_psw_user_detail['id'];
                                ?>
                            </td>
                            <td class="border-r border-solid border-black"><?php echo $update_psw_user_detail['user_email'];?></td>
                            <td class="update-user">
                                <div class="alert-admin">

                                </div>
                                <form action="./update_user_psw_process.php" method="POST">
                                    <input type="hidden" name="update_user_email" value="<?php echo $update_psw_user_detail['user_email']?>"/>
                                    <input type="hidden" name="new_password" value="<?php echo $update_psw_user_detail['new_password'] ?>"/>
                                    <input class="p-2 bg-blue-400 rounded text-white" id="update-btn" type="submit" value="Update">
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