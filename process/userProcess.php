<?php

include '../includes/include_once/db.php';
if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($connect, $_POST['fname']);
    $contactNumber = mysqli_real_escape_string($connect, $_POST['cntno']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $cnfPassword = mysqli_real_escape_string($connect, $_POST['cnfpass']);
    $role = mysqli_real_escape_string($connect, $_POST['usertype']);
    $accountStatus = mysqli_real_escape_string($connect, $_POST['status']);

    $encrypt = password_hash($password, PASSWORD_BCRYPT);       //encrypting password 
    $cnfEncrypt = password_hash($cnfPassword, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(20));                         // Generating random numbers binary to hexa

    $searchQuery = "SELECT email, contactNo FROM users WHERE email = '$email' AND contactNo = '$contactNumber'";
    $execQuery = mysqli_query($connect, $searchQuery);
    $checkUser = mysqli_num_rows($execQuery);

    if ($checkUser == 0) {
        if ($password === $cnfPassword) {
//            $insertQuery = "INSERT INTO users (fullName, contactNo, email, password, cnfPassword, token, role, status) VALUES"
//                    . "('$fullname', '$contactNumber', '$email', '$encrypt', '$cnfEncrypt', '$token', '$role', '$accountStatus')";
//            $execInsertQuery = mysqli_query($connect, $insertQuery);
                    
                    $subject = "Verification Email";
                    $body = "Hi $fullname, Thank you for signing up with <strong>TRYON</strong> An Online Gym Management System.\n "
                            . "Click below link to activate your account.\n "
                            . "http://localhost/ty/activateAccount.php?token=$token";
                    $headers = "From: no-reply@caldikind.xyz";

                    if (mail($email, $subject, $body, $headers)) {
                        $insertQuery = "INSERT INTO users (fullName, contactNo, email, password, cnfPassword, token, role, status, notification) VALUES"
                    . "('$fullname', '$contactNumber', '$email', '$encrypt', '$cnfEncrypt', '$token', '$role', '$accountStatus', '1')";
                    
                        $_SESSION['msg'] = "Email successfully sent to $email.";
                        
                    } else {
                        $insertQuery = "INSERT INTO users (fullName, contactNo, email, password, cnfPassword, token, role, status, notification) VALUES"
                    . "('$fullname', '$contactNumber', '$email', '$encrypt', '$cnfEncrypt', '$token', '$role', '$accountStatus', '0')";
                    
                        echo "Email sending failed...";
                    }
                    $execInsertQuery = mysqli_query($connect, $insertQuery);
                    header('Location:../users.php');
                }
            } else {
                echo 'user already exits';
                header('Location:../users.php');
            }
        }
    
?>