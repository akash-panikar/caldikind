<?php
error_reporting(0);
session_start();
include('includes/include_once/db.php');
if (isset($_POST['contactform'])) {
    $conatctName = mysqli_real_escape_string($connect, $_POST['name']);
    $contactNumber = mysqli_real_escape_string($connect, $_POST['mobile']);
    $contactEmail = mysqli_real_escape_string($connect, $_POST['email']);
    $contactMessage = mysqli_real_escape_string($connect, $_POST['message']);

    $insertEnquiry = "INSERT INTO gymenq (vName, vEmail, vMobile, vType, remark) VALUES "
            . "('$conatctName', '$contactEmail', '$contactNumber', 'Website', '$contactMessage')";
    $query = mysqli_query($connect, $insertEnquiry);
    if($query == TRUE){
        $subject = "Enquiry at TRYOn website";
        $body = "Greetings $conatctName,\n\nThanks for your interest in our service.\nWe recevied your enquiry, our executive"
                . " will get in touch with you soon.\nWith our finest service you can achive you  best way."
                . "Thank you\n"
                . "Sincerly\n\n[Team Tryon]";
        $headers = "From: TRYON <tryongymsoftware@gmail.com>";
        mail($contactEmail, $subject, $body, $headers);
        mysqli_close($connect);
        $message = "Your enquiry has been submitte successfully";
    }
 else {
    $message = "Something went wrong, Please try again";    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Try-on </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="images/logo/logo-2.png"/>
        <link rel="icon" type="image/png" href=""/>
        <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/contact-util.css">
        <link rel="stylesheet" type="text/css" href="css/contact.css">
    </head>
    <body>
        <div class="bg-contact2" style="background-image: url('images/background/bg-03.jpg');">
            <div class="container-contact2">
                <div class="wrap-contact2">
                    <form class="contact2-form validate-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <span class="contact2-form-title">
                            Contact Us
                        </span>

                        <div class="wrap-input2">
                            <label>Name</label>
                            <input class="input2 validate-input" type="text" name="name" required>
                        </div>
                        <div class="wrap-input2">
                            <label>Contact No.</label>
                            <input class="input2 validate-input" type="text" name="mobile" id="mobile" onchange=""required>
                            <p style="color: red;" id="mobile-message"></p>
                        </div>
                        <div class="wrap-input2">
                            <label>Email</label>
                            <input class="input2 validate-input" type="text" name="email" id="email" onchange="validateEmail()"required>
                            <p style="color: red;" id="email-message"></p>
                        </div>

                        <div class="wrap-input2">
                            <label>Message</label>
                            <textarea class="input2 validate-input" name="message" required></textarea>
                        </div>

                        <div class="container-contact2-form-btn">
                            <div class="wrap-contact2-form-btn">
                                <div class="contact2-form-bgbtn"></div>
                                <button class="contact2-form-btn" name="contactform">Send Your Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div style="position: absolute; top: 0; right: 0;">
                    <script>
                        $(function () {
                            $('.toast').toast('show');
                        });
                        //$(function(){
                        //    $('#2').toast('show');
                        //})
                    </script>
                    <?php if ($message != '') { ?>
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
                        </div> <?php } else { ?>
                            <div class="toast" role="alert" data-delay="5000">
                            <div class="toast-header" style="background-color:#ce0e58;">
                                <strong class="mr-auto" style="color: white;">Successful</strong>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                <?=$message; ?>
                            </div>
                        </div>
                    <?php    } ?>     
                </div>
            </div>
        </div>
        <script src="js/contact.js"></script>
    </body>
</html>
