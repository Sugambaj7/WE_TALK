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
                <h1 class="underline">Feedbacks</h1>
            </div>
            <div class="feedbacks">
                <?php
                    include './connection/connection.php';
                    $query = "select * from feedback";
                    $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo $row['feedback'] . "<br>" . "from" . ": " . $row['user_email'] . "<br>" ."<br>";
                        }
                    }
                    else{
                         echo "No feedbacks till now";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>