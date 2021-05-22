<?php

include '../includes/include_once/db.php';
if (isset($_POST['submit'])) {

    $clientFullName = mysqli_real_escape_string($connect, $_POST['fname']);
    $clientPrimaryNumber = mysqli_real_escape_string($connect, $_POST['primaryno']);
    $clientAlternateNumber = mysqli_real_escape_string($connect, $_POST['alternateno']);
    $clientEmail = mysqli_real_escape_string($connect, $_POST['email']);
    $clientAddress1 = mysqli_real_escape_string($connect, $_POST['addr1']);
    $clientAddress2 = mysqli_real_escape_string($connect, $_POST['addr2']);
    $clientLocation = mysqli_real_escape_string($connect, $_POST['location']);
    $clientDistrict = mysqli_real_escape_string($connect, $_POST['district']);
    $clientPincode = mysqli_real_escape_string($connect, $_POST['pincode']);
    $clientDOB = mysqli_real_escape_string($connect, $_POST['dob']);
    $clientGender = mysqli_real_escape_string($connect, $_POST['gender']);
    $clientPhotoId = $_FILES['idproof'];
//    ----------------Form 1 end-------------------------
    $trainerName = '';
    $transactionNo = '';
    $membershipType = mysqli_real_escape_string($connect, $_POST['membership']);
    $trainerName = mysqli_real_escape_string($connect, $_POST['trainer']);
    $clientPackageName = mysqli_real_escape_string($connect, $_POST['packname']);
    $clientPackageDuration = mysqli_real_escape_string($connect, $_POST['duration']);
    $batchSelected = mysqli_real_escape_string($connect, $_POST['batch']);
    $startDate = mysqli_real_escape_string($connect, $_POST['startdate']);
    $endDate = mysqli_real_escape_string($connect, $_POST['enddate']);
    $clientEmergConatctName = mysqli_real_escape_string($connect, $_POST['emgname']);
    $clientEmergContactNo = mysqli_real_escape_string($connect, $_POST['emgnum']);
    $medicalReport = $_FILES['medicalrpt'];
    $medicalProblem = mysqli_real_escape_string($connect, $_POST['medicalprblm']);
//    ----------------------- Form 2 end-----------------
    $paymentMode = mysqli_real_escape_string($connect, $_POST['mode']);
    $totalAmount = mysqli_real_escape_string($connect, $_POST['totalamount']);
    $amountPaid = mysqli_real_escape_string($connect, $_POST['amountpaid']);
    $amountDue = mysqli_real_escape_string($connect, $_POST['amtdue']);
    $dueDate = mysqli_real_escape_string($connect, $_POST['duedate']);
    $transactionNo = mysqli_real_escape_string($connect, $_POST['transno']);
    $PhotoIdFileLocation = '';

    $filePhotoId = $clientPhotoId['name'];
    $fileMedicalReport = $medicalReport['name'];
    $filePhotoIdSize = $clientPhotoId['size'];
    $fileMedicalReportSize = $medicalReport['size'];
    $filePhotoIdError = $clientPhotoId['error'];
    $fileMedicalReportError = $medicalReport['error'];
    $filePhotoIdTmp = $clientPhotoId['tmp_name'];
    $fileMedicalReportTmp = $medicalReport['tmp_name'];
    $filePhotoIdExtension = explode('.', $filePhotoId);
    $fileMedicalReportExtension = explode('.', $fileMedicalReport);
    $filePhotoIdLower = strtolower(end($fileProfileExtension));
    $fileMedicalReportLower = strtolower(end($fileMedicalReportExtension));
    $fileStoreExtension = array('png', 'jpg', 'jpeg');

    $userquery = "SELECT contactNo FROM temp_client WHERE contactNo = '$clientPrimaryNumber'";
    $Result = mysqli_query($connect, $userquery);
    $checkUser = mysqli_num_rows($Result);
    if (!$checkUser == TRUE) {
        if (in_array($filePhotoIdLower, $fileStoreExtension)) {
            if ($filePhotoIdSize < 1048576) {
                $newPhotoIdName = uniqid($clientFullName, false);
                $PhotoIdFileLocation = 0;
                $PhotoIdFileLocation = '../images/clients/' . $newPhotoIdName . '.' . $filePhotoIdLower;
                //move_uploaded_file($fileProfileTmp, $profileFileLocation);
            } else {
                echo 'file is too big';
                //header('Location:../staff.php');
            }
        }

        // saving document (Marksheet)
        if (in_array($fileMedicalReportLower, $fileStoreExtension)) {
            if ($fileMedicalReportSize < 1048576) {
                $newMedicalReportName = uniqid($clientFullName, false);
                $MedicalReportLocation = '0';
                $MedicalReportLocation = '../documents/client_Doc/' . $newMedicalReportName . '.' . $fileMedicalReportLower;
                //move_uploaded_file($fileMarksheetTmp, $marksheetFileLocation);
            } else {
                echo 'file is too big';
                //header('Location:../staff.php');
            }
        }

        $subject = "Welcome to TRYON";
        $body = "Greetings $clientFullName,\n\nThanks for joining TRYON – we’re excited to have you on board! You’ve taken "
                . "the first step towards achieving your fitness goals .\n\n"
                . "Get started by collecting your Access Card from reception. "
                . "During this session we’ll prepare a workout program to"
                . "help you achieve your goals and show you how to use all of the equipment.\n\n"
                . "You’ll informed our opening times, class timetable, and a list of what to bring while "
                . "coming to GYM. If you have any questions, then please don’t hesitate to get in touch. "
                . "Just give a call on +919876543210 or email us at help@tryon.me and we’ll respond asap.\n\n"
                . "Here are some information about your membership:\nMember Name: $clientFullName\nContact No: $clientPrimaryNumber\n"
                . "Membership Type: $membershipType\nTrainer: $trainerName\nPackage Selected: $clientPackageName for $clientPackageDuration\n"
                . "Batch Time: $batchSelected\nMembership starts from $startDate to $endDate\nPackage Amount: $totalAmount\nAmount Paid: $amountPaid\n"
                . "Balance Amount: $amountDue\n"
                . "Kind regards\n\n"
                . "[Team TRYON]";

        $headers = "From: Tryon <tryongymsoftware@gmail.com>";

        if (mail($clientEmail, $subject, $body, $headers) == TRUE) {
            $insertClient = "INSERT INTO temp_client (fullName, contactNo, altContactNo, email, add1,"
                    . "add2, location, district, pincode, dob, gender, photoID, memberType, trainerName, packageName,"
                    . "packageDuration, batchTime, startDate, endDate, EmgContactName, EmgContactNo, medicalReport, medicalProblem,"
                    . "paymentMode, totalAmount, amountPaid, amountDue, dueDate, transactionNo, notification, dtoc)"
                    . " VALUES ('$clientFullName','$clientPrimaryNumber','$clientAlternateNumber','$clientEmail','$clientAddress1',"
                    . "'$clientAddress2','$clientLocation','$clientDistrict','$clientPincode','$clientDOB','$clientGender',"
                    . "'$PhotoIdFileLocation','$membershipType','$trainerName','$clientPackageName','$clientPackageDuration','$batchSelected',"
                    . "'$startDate','$endDate','$clientEmergConatctName','$clientEmergContactNo','$MedicalReportLocation','$medicalProblem',"
                    . "'$paymentMode','$totalAmount','$amountPaid','$amountDue','$dueDate','$transactionNo','1', NOW())";
            $emailStatus = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                    . "('$clientEmail','$subject', '$body', '1' )";
            //echo "Email successfully sent to $clientEmail.";
        } else {
            $insertClient = "INSERT INTO temp_client (fullName, contactNo, altContactNo, email, add1,"
                    . "add2, location, district, pincode, dob, gender, photoID, memberType, trainerName, packageName,"
                    . "packageDuration, batchTime, startDate, endDate, EmgContactName, EmgContactNo, medicalReport, medicalProblem,"
                    . "paymentMode, totalAmount, amountPaid, amountDue, dueDate, transactionNo, notification, dtoc)"
                    . " VALUES ('$clientFullName','$clientPrimaryNumber','$clientAlternateNumber','$clientEmail','$clientAddress1',"
                    . "'$clientAddress2','$clientLocation','$clientDistrict','$clientPincode','$clientDOB','$clientGender',"
                    . "'$PhotoIdFileLocation','$membershipType','$trainerName','$clientPackageName','$clientPackageDuration','$batchSelected',"
                    . "'$startDate','$endDate','$clientEmergConatctName','$clientEmergContactNo','$MedicalReportLocation','$medicalProblem',"
                    . "'$paymentMode','$totalAmount','$amountPaid','$amountDue','$dueDate','$transactionNo','0', NOW())";
            $emailStatus = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                    . "('$clientEmail','$subject', '$body', '0' )";
            //echo "Email sending failed...<br>";
            //echo $insertClient;
        }
        $insertQuery = mysqli_query($connect, $insertClient);
        $execEmailStatus = mysqli_query($connect, $emailStatus);
        header("Location:../client.php");

        if ($insertQuery == true) {
            move_uploaded_file($filePhotoIdTmp, $PhotoIdFileLocation);
            move_uploaded_file($fileMedicalReportTmp, $MedicalReportLocation);
        } else {
            echo "Failed<br>";
            echo $insertClient;
            //mysqli_close($connect);
        }
    } else {
        echo 'Already exist';
        mysqli_close($connect);
    }
}
?>