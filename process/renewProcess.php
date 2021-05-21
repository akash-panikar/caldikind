<?php

include('../includes/include_once/db.php');
if (isset($_POST['renew_id'])) {
    $id = $_POST['renew_id'];
    $sql = "SELECT * FROM temp_client WHERE tID = '$id'";
    $results = mysqli_query($connect, $sql);
    $data = array();
    while ($result = mysqli_fetch_array($results)) {
        $data['id'] = $result['tID'];
        $data['name'] = $result['fullName'];
        $data['contactNo'] = $result['contactNo'];
        $data['amtdue'] = $result['amountDue'];
        $data['expired'] = $result['endDate'];
        $data['package'] = $result['packageName'];
        $data['email'] = $result['email'];
    }
    echo json_encode($data);
    exit();
}

if (isset($_POST['renewSubmit'])) {
    $id = $_GET['id'];
    $package = $_POST['package'];
    $period = $_POST['period'];
    $startDate = $_POST['startdate'];
    $endDate = $_POST['enddate'];
    $totalAmount = $_POST['totalamt'];
    $balAmount = $_POST['balamt'];
    $amount = $_POST['amtpaid'];
    $clientName = $_POST['fname'];
    $clientEmail = $_POST['email'];
    $date = date('y-m-d');
    $insertRenewal = "INSERT INTO membershiprenewal (renewalDate, startDate, endDate, packageName) VALUES "
            . "('$date', '$startDate', '$endDate', '$package')";
    $execQuery = mysqli_query($connect, $insertRenewal);
    if ($execQuery == TRUE) {
        $updateRenewal = "UPDATE temp_client"
                . " SET totalAmount = '$totalAmount'"
                . ", amountPaid = '$amount'"
                . ", amountDue = '$balAmount'"
                . ", endDate = '$endDate'"
                . ", packageDuration = '$period'"
                . ", packageName = '$package' WHERE tID = '$id'";
        $execUpdateRenewal = mysqli_query($connect, $updateRenewal);


        if ($execUpdateRenewal == TRUE) {

            $emailRenewSubject = "Membership Renewed";
            $emailRenewBody = "Dear $clientName your membership has been renewed."
                    . " We have received the payment of ₹$amount for your subscription."
                    . "\nThank you for choosing TRYON! With our finest trainers and"
                    . " equipment we will help you reach your fitness goal in the healthiest"
                    . " and quickest way.\nWe wish you the best on your fitness journey!";
            $clientRenewEmail = "$clientEmail";
            $emailSender = "From: Tryon <tryongymsoftware@gmail.com>";
            if (mail($clientRenewEmail, $emailRenewSubject, $emailRenewBody, $emailSender)) {
                $emailInsert = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                        . "('$clientRenewEmail','$emailRenewSubject', '$emailRenewBody', '1' )";
                echo $emailInsert;
            } else {
                $emailInsert = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                        . "('$clientRenewEmail','$emailRenewSubject', '$emailRenewBody', '0' )";
                echo $emailInsert;
            }
            mysqli_query($connect, $emailInsert);
            header('Location:../renew.php');
            exit();
        } else {
            echo $updateRenewal;
            echo '<br>Something went wrong--1';
        }
    }
} else {
    echo 'Something went wrong-----2';
}
?>