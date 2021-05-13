<?php
error_reporting(0);
include('includes/include_once/db.php');
if (isset($_POST['submit'])) {
    $recoverEmail = mysqli_real_escape_string($connect, $_POST['email']);
    $searchEmail = "SELECT * from gymusers WHERE email='$recoverEmail'";
    $exeQuery = mysqli_query($connect, $searchEmail);
    $newToken = bin2hex(random_bytes(20));  
    $encryptnewToken = password_hash($newToken, PASSWORD_BCRYPT);       //encrypting new token
    $tokenExpireTime = date("U")+600;
    $userData = mysqli_fetch_assoc($exeQuery);
    if ($recoverEmail == $userData['email']) {
        $fullName = $userData['fullName'];
        $updateToken = "UPDATE gymusers SET token='$encryptnewToken',tokenExpireTime='$tokenExpireTime' WHERE email='$recoverEmail'";
        $execUpdateToken = mysqli_query($connect,$updateToken);
        $searchEmail = "SELECT * from gymusers WHERE email='$recoverEmail'";
        $exeQuery = mysqli_query($connect, $searchEmail);
        $newData = mysqli_fetch_assoc($exeQuery);
//        $searchEmailToken = $newData['token'];
//        echo $searchEmailToken.'<br>';
//        echo '------------------';
//        echo $encryptnewToken;
//        exit();
//        $token = $newData['token'];
        $emailSubject = "Reset Your Password";
        $emailBody = "Hi, $fullName. \nWe received a password reset request. Click the below link to reset your Tryon account password"
                . " \nhttps://localhost/caldikind/resetPassword.php?token=$newToken\n"
                . "This link will be active for 10 minutes.\n\n\n"
                . "<b>Didn't request this change?</b>\n"
                . "If you didn't request a new password, let us know.\n";
        $emailSender = "From: Tryon <tryongymsoftware@gmail.com>";

        if (mail($recoverEmail, $emailSubject, $emailBody, $emailSender)) {
            $message = "Mail sent at $recoverEmail";
        } else {
            $message = "Reset email sending fail";
        }
    } else {

        $message = "Email Does not Exist";
    }
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
                        <span class="forgot-pass-title p-b-20 p-t-27">Forgot Password ?</span>
                        <?php
                        if($_SESSION['msg']){
                            echo '<div class="alert alert-success" role="alert">Email send successfully</div>';
                        }
                        
                        ?>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="email" placeholder="Enter your email">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                    <div class="text-center p-t-30">
                        <a class="txt1" href="index.php"><span class="fa fa-long-arrow-left" style="color: white;"></span>Back to Login</a>
                    </div>
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
<!--                            <div class="toast" role="alert" data-delay="5000">
                                <div class="toast-header" style="background-color:#ce0e58;">
                                    <strong class="mr-auto" style="color: white;">Login Failed</strong>
                                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="toast-body">
                                    <?//=$message; ?>
                                </div>
                            </div>     -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>