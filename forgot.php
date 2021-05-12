<?php
error_reporting(0);
session_start();
include('includes/include_once/db.php');
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['pass']);
    $check = "SELECT * FROM gymusers WHERE email = '$email'";       //and accountStatus = 'Active"
    $exec = mysqli_query($connect, $check);
    $find = mysqli_num_rows($exec);
    if ($find == TRUE) {
        $checkPass = mysqli_fetch_assoc($exec);
        $tempPass = $checkPass['passwd'];
        $decode_pass = password_verify($password, $tempPass);
        $_SESSION['fullName'] = $checkPass['fullName'];
        $accountStatus = $checkPass['accountStatus'];
        if ($decode_pass) {
            if ($accountStatus == Active) {
                session_start('mID');
                header("location:dash.php");
                exit();
            } else {
                $message = "Your account is inactive";
            }
        } else {
            $message = "Entered email or password is incorrect";
        }
    } else {
        $message = "Invalid email address";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TRYON | LOGIN</title>
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
                
            </div>
        </div>
    </body>
</html>