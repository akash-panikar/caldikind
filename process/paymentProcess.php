<?php
include('../includes/include_once/db.php');
if(isset($_POST['pay_id'])){
 $id = $_POST['pay_id'];
 $sql = "SELECT * FROM temp_client WHERE tID = '$id'";
 $results = mysqli_query($connect, $sql);
 $data = array();
 while($result = mysqli_fetch_array($results)){
     $data['id'] = $result['tID'];
     $data['name'] = $result['fullName'];
     $data['contactNo'] = $result['contactNo'];
     $data['balAmount'] = $result['amountDue'];
 } 
 echo json_encode($data);
exit;
}



if(isset($_POST['updatePayment'])){
    $id = $_GET['id'];
    $balAmount = $_POST['balamount'];
    $amount = $_POST['amount'];
    $paymentMode = $_POST['paymentmode'];
    $remark = $_POST['remark'];
    $checkQuery = "SELECT fullName, email, totalAmount, amountDue FROM temp_client WHERE tID = $id";
    $execQuery = mysqli_query($connect,$checkQuery);
    $result = mysqli_fetch_assoc($execQuery);
    $clientName = $result['fullName'];
    $clientReceiptEmail = $result['email'];
    $amountDue = $balAmount - $amount;
    $updatePayment = "UPDATE temp_client"
            . " SET amountPaid = '$amount'"
            . ", amountDue = '$amountDue'"
            . ", paymentMode = '$paymentMode' WHERE tID = '$id'";
    $execUpdatePayment = mysqli_query($connect,$updatePayment);
    if($execUpdatePayment == TRUE){
        if(!empty($remark)){
            $emailRemarkSubject = "Client Payment Remark";
            $emailRemarkBody = "Dear Manager,\n$remark\n\nAbove message is from $clientName";
            $managerRemarkEmail = "akashpanikar1995@gmail.com";
            $emailSender = "From: Tryon <tryongymsoftware@gmail.com>";
            if(mail($managerRemarkEmail, $emailRemarkSubject, $emailRemarkBody, $emailSender)){
                $emailInsert = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                    . "('$managerRemarkEmail','$emailRemarkSubject', '$emailRemarkBody', '1' )";
                echo $emailInsert;
            } else {
                $emailInsert = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                    . "('$managerRemarkEmail','$emailRemarkSubject', '$emailRemarkBody', '0' )";
                echo $emailInsert;
            }
            mysqli_query($connect, $emailInsert);
        }
        $emailReceiptSubject = "Payment Receipt";
        $emailReceiptBody = "Dear $clientName,\nThank you for making payment.\nToday amount paid ₹$amount"
                . "\nBalance Amount ₹$amountDue\n Kindly pay balance amount before  due date. If already paid"
                . " kindly ignore message. \n\nThank you";
        if(mail($clientReceiptEmail, $emailReceiptSubject, $emailReceiptBody, $emailSender)){
                $emailReceiptInsert = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                    . "('$clientReceiptEmail','$emailReceiptSubject', '$emailReceiptBody', '1' )";
        } else {
            $emailReceiptInsert = "INSERT INTO email_list (emailReceipent, emailSubject, emailBody, status) VALUES "
                . "('$clientReceiptEmail','$emailReceiptSubject', '$emailReceiptBody', '0' )";
        }
        mysqli_query($connect, $emailReceiptInsert);
        header('Location:../client.php');
        exit();
    } else {
        echo $updatePayment;
        echo '<br>Something went wrong--1';
    }
} else {
        echo 'Something went wrong';
    }
?>