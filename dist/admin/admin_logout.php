<?php
    session_start();
    if(isset($_SESSION['admin_unique_id'])){
                session_unset();
                session_destroy();
                echo('<script type="text/javascript">alert("Successfully! Logged out!!!");window.location=\'./admin_login.php\';</script>)');
            }
            else{
                echo "Unable to logout";
            }
?>
