<?php
include '../includes/include_once/db.php';
$checkAttendance = "SELECT * from gymstaff WHERE gymattendance.status = '' AND DATE(date) = DATE(NOW()) ORDER BY aID DESC LIMIT 1";
    $execCheckQuery = mysqli_query($connect, $checkAttendance);
//    $result = mysqli_fetch_assoc($execCheckQuery);
    
    while($row = mysqli_fetch_assoc($execCheckQuery)){
    echo $row['sNmae'];
    echo $row['staffCode'];
    }
    $isInsert = 0;
    if (empty($result)) {
        $isInsert = 1;
    } else {
        if (!is_null($result['outTime'])) {
            $isInsert = 1;
            echo '1';
        }
    }
    if ($isInsert == 1) {
//        $query = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
//                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
    } else {
//        $query = "UPDATE gymattendance SET outTime ='$currentTime'"
//                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
    }
    //$execQuery = mysqli_query($connect, $query);
    //header('Location:../staffAttendance.php');
    
    ?>