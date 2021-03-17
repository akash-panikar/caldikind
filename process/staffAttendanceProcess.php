<?php
include '../includes/include_once/db.php';
if(isset($_POST['submit'])){
    $uniqueID = $_POST['uid'];
    $mydate=getdate(date("U"));
    $date = "$mydate[mday]/$mydate[mon]/$mydate[year]";
    $checkAttendance = "SELECT * from gymattendance LIKE 'date' = '$date'";
    $execQuery = mysqli_query($connect, $checkAttendance);
            $enterAttendance = "INSERT INTO gymattendance(staffCode, outTime, status) VALUES ('$uniqueID', 'NULL', Present' )";
        $execQuery = mysqli_query($connect, $enterAttendance);
        if($execQuery == TRUE){
            echo 'Data entered';
            header('Location:../staffAttendance.php');
            exit();
        } else{
            echo ' Something where wrong, please check';
            echo "";
        }
//    if($uniqueID == true){
//        echo "already exist";
//    }
//    else{
//        
//    }
}

?>