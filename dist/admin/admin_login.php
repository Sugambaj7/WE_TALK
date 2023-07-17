<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
</head>
<body>
    <div  class="whole-div flex flex-row">
       <div>
           
       </div>
        <div class=" flex justify-center items-center w-screen h-screen">
            <div class = "flex flex-col">
                <div class="flex justify-center items-center mb-8" >
                    <img src="./assets/images/we talk logo2.png"  height="100px" width="100px" alt="" srcset="">
                </div>
                <div class="login border border-lid border-black" >
                    <div>
                        <form class="px-12 py-12"  name="user_login_form" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div>
                                <div class="mb-3">
                                    <h1 class="text-2xl">Admin Login</h1>
                                </div>

                                <div class="error-txt">

                                </div>
                                <div>
                                    <label for="">Username</label>
                               </div>
                               <div>
                                    <input type="text" name = "admin_username" placeholder="Enter your username" class="pl-2 border border-black w-56 py-0.5">
                               </div>
                            </div>
                            <div>
                                <div>
                                    <label for="">Password</label>
                               </div>
                               <div>
                                    <input type="password" name = "admin_password" placeholder="Enter your password" class="pl-2 border border-black w-56 py-0.5">
                               </div>
                            </div>
                            <div class="button bg-green-500 flex justify-center  my-0.5 mt-4" >
                                    <input class="text-white pt-1 pb-1" type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="w-28">
          
        </div>

    </div>
    <script src="./assets/js/admin_login.js"></script>
    
</body>
</html>