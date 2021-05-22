<?php
include('../includes/include_once/db.php');
$failedEmail = "SELECT * FROM email_list WHERE status = 0 AND retryAttempt < 5 LIMIT 0, 10";
$execFailedEmail = mysqli_query($connect, $failedEmail);
while($result = mysqli_fetch_assoc($execFailedEmail)){
    $recipientEmail = $result['emailReceipent'];
    $emailSubject = $result['emailSubject'];
    $emailBody = $result['emailBody'];
    $retry = $result['retryAttempt'];
    $id = $result['eID'];
    echo $result['emailReceipent'],$result['emailSubject'],$result['emailBody'],$result['retryAttempt'],$result['eID'].'<br>';
    if(mail($recipientEmail, $emailSubject, $emailBody) == TRUE){
        $updateMailList = mysqli_query($connect, "UPDATE email_list SET status = 1, retryAttempt = '$retry'+1 WHERE eID = '$id'");
    }
}
