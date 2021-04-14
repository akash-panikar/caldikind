<?php
error_reporting(1);
include '../includes/include_once/db.php';
if (isset($_POST['submit'])) {
    $uniqueID = $_POST['uid'];
    $mydate = getdate(date("U"));
    $date = "$mydate[mday]/$mydate[mon]/$mydate[year]";
    $checkAttendance = "SELECT * from gymattendance WHERE staffCode = '$uniqueID' AND DATE(date) = DATE(NOW()) ORDER BY aID DESC LIMIT 1";
    $execCheckQuery = mysqli_query($connect, $checkAttendance);
    $result = mysqli_fetch_assoc($execCheckQuery);
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
        $query = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
    } else {
        $query = "UPDATE gymattendance SET outTime ='$currentTime'"
                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
    }
    $execQuery = mysqli_query($connect, $query);
    header('Location:../staffAttendance.php');
//    if(is_null($result) || !empty('outTime')){                                                                     // && 'outTime'
//        $updateOutTime = "UPDATE gymattendance SET outTime ='$currentTime'"
//                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
//            $execOutQuery = mysqli_query($connect, $updateOutTime);
//       
//        if($result == empty('inTime')){
//            $enterAttendance = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
//                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
//            $execInsertQuery = mysqli_query($connect, $enterAttendance);
//        }
////        if ($execInsertQuery == TRUE) {
////            echo 'Data entered';
////            header('Location:../staffAttendance.php');
////            exit();
////        } else {
////            echo '<br> Something where wrong, please check';
////        }
//    }
//    else {
//        echo 'ok';    
//    }

    
//    if ($result ==!'outTime') {
//        $updateOutTime = "UPDATE gymattendance SET outTime ='$currentTime'"
//                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
//        $execOutQuery = mysqli_query($connect, $updateOutTime);
//        if($result == empty('inTime' && 'outTime')){
//            $enterAttendance = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
//                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
//            $execInsertQuery = mysqli_query($connect, $enterAttendance);
//        }
//        
//        
//        if ($execOutQuery == TRUE) {
//            //echo $updateOutTime. '<br>Data entered';
//            header('Location:../staffAttendance.php');
//            exit();
//        } else {
//            echo '<br> Something where wrong, please check';
//        }
//    } else {
//        echo $currentDate;
//        echo "<br>".$currentTime;
//        exit();
//        $enterAttendance = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
//                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
//        
//        $execInsertQuery = mysqli_query($connect, $enterAttendance);
//        if ($execInsertQuery == TRUE) {
//            echo 'Data entered';
//            header('Location:../staffAttendance.php');
//            exit();
//        } else {
//            echo '<br> Something where wrong, please check';
//        }
//        
//    }
}
?>