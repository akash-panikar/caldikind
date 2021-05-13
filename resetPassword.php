<?php
error_reporting(0);
include('includes/include_once/db.php');
$getToken = $_GET['token'];
echo $token.'+++++++++++++++++++++++++++';
if (isset($_POST['change'])) {
    $token = $_GET['token'];
    $newpassword = mysqli_real_escape_string($connect, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($connect, $_POST['cnfpassword']);
    $encrypt = password_hash($newpassword, PASSWORD_BCRYPT);       //encrypting password 
    $cnfEncrypt = password_hash($confirmPassword, PASSWORD_BCRYPT);
//        $updatetoken = bin2hex(random_bytes(20));
    if ($newpassword == $confirmPassword) {
        $searchToken = "SELECT token from gymusers";
        $execSerachToken = mysqli_query($connect, $searchToken);
        $result = mysqli_fetch_assoc($execSerachToken);
        $tokenBin = hex2bin($token);
        $validateToken = password_verify($tokenBin, $result['token']);
        if ($validateToken == TRUE) {
            echo 'Successfull';
        } else {
            echo 'Failed';
        }

//            $updateNewPassword = "UPDATE gymuser SET password= '$newpassword' WHERE token='$token'";
//            $execQuery = mysqli_query($connect, $updateNewPassword);
//            if($execQuery == TRUE){
//                mysqli_close($connect);
//                header("Location:index.php");
//            }
    } else {
        echo"password doesn't match";
    }
} else {
    echo 'no token found';
}
?>

<html lang="en">
    <head>
        <title>TRYON</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/logo/logo-2.png"/>
        <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="includes/fonts/material-design-iconic-font.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="includes/jquery/jquery.min.js"></script>
        <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <span class="login100-form-logo">
                            <img src="images/logo/logo-2.png" height="80">
                        </span>
                        <span class="forgot-pass-title p-b-20 p-t-27">Change Password</span>
                        <input type="text" name="token" value="<?=$getToken;?>" style="display:none">
                        <div class="wrap-input100">
                            <input class="input100" type="password" id="password" name="password" placeholder="new password" autocomplete="new-password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        <div id="message">
                            <style>
                            .invalid {
                                color: red;
                                font-size: 12px;
                            }
                            .valid {
                                color: green;
                                font-size: 12px;
                                /*display: none;*/
                            }
                            </style>
                            <p style="color:white">Password must contain the following:</p>
                            <p id="letter" class="invalid">
                                <b>lowercase, </b>
                                <b id="capital">UPPERCASE, </b>
                                <b id="number">number, </b>
                                <b id="length">Minimum 8 characters</b>
                            </p>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="password" id="cnfpass" name="cnfpassword" placeholder="confirm password" autocomplete="off">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        <div id="validMessage">
                            <p class="incorrect"></p>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="change">
                                Change Password
                            </button>
                        </div>
                    </form>
                    <div class="text-center p-t-30"></div>
                    <!-- Position it -->
                    <div style="position: absolute; top: 0; right: 0;">
                        <script>
                            $(function () {
                                $('.toast').toast('show');
                            });
                            //$(function(){
                            //    $('#2').toast('show');
                            //})
                        </script>
                        <!-- Then put toasts within -->                        
                            <div class="toast" role="alert" data-delay="5000">
                                <div class="toast-header" style="background-color:#ce0e58;">
                                    <strong class="mr-auto" style="color: white;">Login Failed</strong>
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    <?=$message; ?>
                                </div>
                            </div>     
                    </div>
                </div>
            </div>
        </div>
        <script src="js/validation.js"></script>
    </body>
</html>