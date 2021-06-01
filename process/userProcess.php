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
            $body = "Hello $fullname, Thank you for signing up with <strong>TRYON</strong> An Online Gym Management System.\n "
                    . "Click below link to activate your account.\n "
                    . "http://localhost/caldikind/activateAccount.php?token=$token";
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

// Suspend User Process
if (isset($_POST['suspend'])) {
    $suspendRowID = $_GET['id'];
    //echo $suspendRowID;
    //exit();
    $suspendRecord = "UPDATE users SET status = 'Suspended' WHERE uID='$suspendRowID'";
    $execQuery = mysqli_query($connect, $suspendRecord);
    if ($execQuery == TRUE) {
        mysqli_close($connect);
        header('Location:../users.php');
        exit();
    }
}

// Delete user Process
if (isset($_POST['delete'])) {
    $deleteRowID = $_GET['id'];
    //echo $deleteRowID;
    $deleteRecord = "DELETE FROM users WHERE uID='$deleteRowID'";
    $execQuery = mysqli_query($connect, $deleteRecord);
    if ($execQuery == TRUE) {
        mysqli_close($connect);
        header('Location:../users.php');
        exit();
    }
}

if(isset($_POST['edit_id'])){
 $id = $_POST['edit_id'];
 $sql = "SELECT * FROM users WHERE uID = '$id'";
 $results = mysqli_query($connect, $sql);
 $data = array();
 while($result = mysqli_fetch_array($results)){
     $data['id'] = $result['uID'];
     $data['name'] = $result['fullName'];
     $data['contactNo'] = $result['contactNo'];
     $data['email'] = $result['email'];
     $data['role'] = $result['role'];
     $data['status'] = $result['status'];
 } 
 echo json_encode($data);
exit;
}
?>