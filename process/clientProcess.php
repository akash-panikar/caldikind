<?php
include 'db.php';
if(isset($_POST['submit']))
{    
//    $clientFullName = $_POST['cfname'];
//    $clientPrimaryNumber = $_POST['pcontact'];
//    $clientAlternateNumber = $_POST['acontact'];
//    $clientEmail = $_POST['cemail'];
//    $clientAddress1 = $_POST['caddress'];
//    $clientAddress2 = $_POST['caddress'];
//    $clientDOB = $_POST['cdob'];
//    $clientGender = $_POST['cgender'];
//    $clientPackage = $_POST['package'];
//    $clientEmergConatctName = $_POST['emecntnm'];
//    $clientEmergContactNo = $_POST['emecntno'];
//    $ReferredBy = $_POST['referred'];
//    $MembershipType = $_POST['ctype'];
//    $StartDate = $_POST['csd'];
//    $EndDate = $_POST['ced'];
//    $MedicalHistory = $_POST['cremark'];
    $clientFullName = $_POST['fname'];
    $clientPrimaryNumber = $_POST['primaryno'];
    $clientAlternateNumber = $_POST['alternateno'];
    $clientEmail = $_POST['email'];
    $clientAddress1 = $_POST['addr1'];
    $clientAddress2 = $_POST['addr2'];
    $clientLocation = $_POST['location'];
    $clientDistrict = $_POST['district'];
    $clientPincode = $_POST['pincode'];
    $clientDOB = $_POST['dob'];
    $clientGender = $_POST['gender'];
//    ----------------Form 1 end-------------------------
    $membershipType = $_POST['membership'];
    $trainerName = $_POST['trainer'];
    $clientPackageName = $_POST['packname'];
    $clientPackageType = $_POST['duration'];
    $batchSelected = $_POST['batch'];
    $startDate = $_POST['startdate'];
    $endDate = $_POST['enddate'];
    $clientEmergConatctName = $_POST['emgname'];
    $clientEmergContactNo = $_POST['emgnum'];
    $medicalReport = $_POST['medicalrpt'];
//    ----------------------- Form 2 end-----------------
    $paymentMode = $_POST['mode'];
    $totalAmount = $_POST['totalamount'];
    $amountPaid = $_POST['amountpaid'];
    $amountDue = $_POST['amtdue'];
    $dueDate = $_POST['duedate'];
    $transactionNo = $_POST['transno'];

    $userquery = "SELECT cMobile FROM gymclients WHERE cMobile = '$clientContactNumber'";        
    $Result =  mysqli_query ($connect, $userquery);
    $checkUser = mysqli_num_rows($Result);
    if(!$checkUser)
    {
        $insertClient = "INSERT INTO gymclients (fullName, contactNo, altContactNo, email, add1"
                . ", add2, location, district, pincode, dob, gender, photoID, createAcc)"
                ." VALUES ('$clientFullName','$clientGender','$clientEmail','$clientContactNumber','$clientAddress',"
                . "'$clientDOB','$clientEmergConatctName','$clientEmergContactNo','$ReferredBy','$MembershipType',"
                . "'$StartDate','$EndDate','$MedicalHistory')";
        $insertQuery = mysqli_query ($connect, $insertClient);

        if($insertQuery == true)
        {
//            echo 'Data Inserted';
//            mysqli_close($connect);
//            header('Location:client.php');
            $subject = "Welcome to TRYON";
            $body = "Greetings $clientFullName,\n\nThanks for joining TRYON – we’re excited to have you on board! You’ve taken "
                ."the first step towards achieving your fitness goals .\n\n"
                ."Get started by collecting your Access Card from reception. "
                ."During this session we’ll prepare a workout program to"
                ."help you achieve your goals and show you how to use all of the equipment.\n\n"
                ."You’ll informed our opening times, class timetable, and a list of what to bring while "
                ."coming to GYM. If you have any questions, then please don’t hesitate to get in touch. "
                ."Simply call us on +919876543210 or email us at help@tryon.me and we’ll respond asap.\n\n"
                ."Kind regards\n\n"
                ."[Team TRYON]";
    
            $headers = "From: newopenlearningschool@gmail.com";
    
            if (mail($clientEmail, $subject, $body, $headers))
            {
                echo "Email successfully sent to $clientEmail.";
                header('Location:client.php');
            } 
            else 
            {
                echo "Email sending failed...";
            }
        }
        else 
        {
            echo "Failed\t";
            echo $insertClient;
            mysqli_close($connect);
        }
    }
    else
    {
        echo 'Already exist';
        mysqli_close($connect);
    }
}
?>