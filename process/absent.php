<?php
include '../includes/include_once/db.php';
$data = "SELECT gymstaff.staffCode AS gymstaffcode, gymattendance.staffcode AS gymattendancecode FROM gymstaff"
        . " JOIN gymattendance ON gymattendance.staffCode!=gymstaff.staffCode AND date(date) = date(now())";
$query = mysqli_query($connect, $data);
while ($result = mysqli_fetch_assoc($query)) {
    if ($result['gymstaffcode'] != 'gymattendancecode') {
        $staffcode = $result['gymstaffcode'];
        $insertAbsentees = "INSERT INTO gymattendance (staffCode, date, inTime, outTime, status)"
                . "VALUES ('$staffcode','$currentDate', '00:00:00', '00:00:00', 'Absent')";
        //print_r($insertAbsentees);
        $execAbesenteesQuery = mysqli_query($connect, $insertAbsentees);
        //print_r([$execAbesenteesQuery]);
    }
}
//if ($execAbesenteesQuery == 1) {
//    $subject = "Welcome to TRYON";
//    $body = "Dear Admin,\nThere is some problem with attendance absent marking file.\n"
//            . "Please check\nThank You";
//    $headers = "From: tryongymsoftware@gmail.com";
//    $adminEmail = "akashpanikar1995@gmail.com";
//    mail($adminEmail, $subject, $body, $headers);
//}
?>