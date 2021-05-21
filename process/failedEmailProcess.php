<?php
include('../includes/include_once/db.php');
$failedEmail = mysqli_query($connect, "SELECT * FROM email_list WHERE status == 0 AND retryAttempt < 5 LIMIT 0, 10");
while($result = mysqli_fetch_assoc($failedEmail)){
    $recipientEmail = $result['emailReceipent'];
    $emailSubject = $result['emailSubject'];
    $emailBody = $result['emailBody'];
    $retry = $result['retryAttempt'];
    $id = $result['eID'];
    if(mail($recipientEmail, $emailSubject, $emailBody) == TRUE){
        $updateMailList = mysqli_query($connect, "UPDATE email_list SET status = 1, retryAttempt = '$retry'+1 WHERE eID = '$id'");
    }
}
