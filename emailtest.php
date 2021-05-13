<?php
//$to_email = "akashpanikar1995@gmail.com";
//$subject = "Simple Email Test via PHP";
//$body = "Greetings Akash.\nThis is to remind you that the payment of your gym membership is due on 25/5/21. "
//        . "The total amount owed is <b>₹2000</b> only and can be paid at gym reception desk.\n"
//        . "Please contact us if you have any query concerning the same.\n\n"
//        ."Sincerely\n\n"
//        ."Team Tryon";
//$headers = "From: tryongymsoftware@gmail.com";
//
//if (mail($to_email, $subject, $body, $headers)) {
//    echo "Email successfully sent to $to_email...";
//} else {
//    echo "Email sending failed...";
//}

$x = date("U")+600;
$y = date("U");
echo "Hello world!*****".$x.'<br>'.$y.'<br>';
echo 'more time------'.date('Y/m/d H:i:s', $x).'<br>';
echo 'current--------'.date('Y/m/d H:i:s', $y);

?>