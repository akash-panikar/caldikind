<?php

include '../includes/include_once/db.php';
if (isset($_POST['submit'])) {
    $uniqueID = $_POST['uid'];
    $mydate = getdate(date("U"));
    $date = "$mydate[mday]/$mydate[mon]/$mydate[year]";
    $checkAttendance = "SELECT * from gymattendance WHERE staffCode = '$uniqueID' AND DATE(date) = DATE(NOW())";
    $execCheckQuery = mysqli_query($connect, $checkAttendance);
    $result = mysqli_num_rows($execCheckQuery);
    
//    $userquery = "SELECT sPrimaryContact FROM gymstaff WHERE sPrimaryContact = '$staffprimContact'";
//    $Result = mysqli_query($connect, $userquery);
//    $checkUser = mysqli_num_rows($Result);
    
    if ($result > 0) {
        $updateOutTime = "UPDATE gymattendance SET outTime ='$currentDateTime'"
                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
        $execOutQuery = mysqli_query($connect, $updateOutTime);
        if ($execOutQuery == TRUE) {
            //echo $updateOutTime. '<br>Data entered';
            header('Location:../staffAttendance.php');
            exit();
        } else {
            echo '<br> Something where wrong, please check';
        }
    } else {
        $enterAttendance = "INSERT INTO gymattendance(staffCode, outTime, status) VALUES"
                . " ('$uniqueID', 'CURTIME()', 'Present' )";
        $execInsertQuery = mysqli_query($connect, $enterAttendance);
        if ($execInsertQuery == TRUE) {
            echo 'Data entered';
            header('Location:../staffAttendance.php');
            exit();
        } else {
            echo '<br> Something where wrong, please check';
        }
        
    }
}
?>