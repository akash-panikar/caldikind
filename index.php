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
                    echo "Your account is inactive";
                }
            } else {
                echo "Entered Password is incorrect";
            }
        } else {
            echo "Invalid email address";
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
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <span class="login100-form-logo">
                            <img src="images/logo/logo-2.png" height="80">
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
                            Log in
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" onfocus="this.value=''" id="cap" type="text" name="email" placeholder="email">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" onfocus="this.value=''" id="cap" type="password" name="pass" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>
                        <p id="text" style="color:white;">WARNING! Caps lock is ON.</p>
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" type="submit" name="submit">
                                Login
                            </button>
                        </div>
                    </form>
                        <div class="text-center p-t-90">
                            <a class="txt1" href="#">
                                Forgot Password?
                            </a>
                        </div>
                    <script>
                        var input = document.getElementById("cap");
                        var text = document.getElementById("text");
                        input.addEventListener("keyup", function(event) {

                        if (event.getModifierState("CapsLock")) {
                            text.style.display = "block";
                          } else {
                            text.style.display = "none"
                          }
                        });
                    </script>
                </div>
            </div>
        </div>
        
</body>
</html>