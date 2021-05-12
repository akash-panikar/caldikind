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
        if ($execAbesenteesQuery == 1) {
        //echo 'working';
            $subject = "Welcome to TRYON";
            $body = "Dear Admin,\nThere is some problem with attendance absent marking file.\n"
                    . "Please check\nThank You";
            $headers = "From: tryongymsoftware@gmail.com";
            $adminEmail = "akashpanikar1995@gmail.com";
            mail($adminEmail, $subject, $body, $headers);
        }
    }
?>


<?php
//$checkAttendance = "SELECT * from gymstaff WHERE gymattendance.status = '' AND DATE(date) = DATE(NOW()) ORDER BY aID DESC LIMIT 1";
//    $execCheckQuery = mysqli_query($connect, $checkAttendance);
////    $result = mysqli_fetch_assoc($execCheckQuery);
//    
//    while($row = mysqli_fetch_assoc($execCheckQuery)){
//    echo $row['sNmae'];
//    echo $row['staffCode'];
//    }
//    $isInsert = 0;
//    if (empty($result)) {
//        $isInsert = 1;
//    } else {
//        if (!is_null($result['outTime'])) {
//            $isInsert = 1;
//            echo '1';
//        }
//    }
//    if ($isInsert == 1) {
//        $query = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
//                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
//    } else {
//        $query = "UPDATE gymattendance SET outTime ='$currentTime'"
//                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
    }
    //$execQuery = mysqli_query($connect, $query);
    //header('Location:../staffAttendance.php');
    
    ?>