<?php

include '../includes/include_once/db.php';
$data = "SELECT fullName, email, memberType, amountDue, dueDate FROM temp_client WHERE amountDue != '0' AND dueDate = DATE(NOW())";
$query = mysqli_query($connect, $data);
while ($result = mysqli_fetch_assoc($query)) {
    $date = $result['dueDate'];
    $amountDue = $result['amountDue'];
    $clientName = $result['fullName'];
    $clientEmail = $result['email'];
    $subject = "Gym membership payment Reminder";
    $body = "Greetings $clientName.\nThis is to remind you that the payment of your gym membership is due on $date. "
            . "The total amount owed is <strong>₹$amountDue</strong> only and can be paid at gym reception desk.\n"
            . "Please contact us if you have any query concerning the same.\n\n"
            . "Sincerely\n\n"
            . "Team Tryon";
    $headers = "From: tryongymsoftware@gmail.com";
    mail($clientEmail, $subject, $body, $headers);
}
?>