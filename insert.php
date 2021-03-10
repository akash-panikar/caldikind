<?php
session_start();
include('includes/include_once/db.php');

$fullName =  'Akash'; //  mysqli_real_escape_string($connect, $_POST['name']);
$facebookID = '346598364598'; //  mysqli_real_escape_string($connect, $_POST['id']);

// print_r($fullName);
// print_r($facebookID);
// exit();
$checkQuery = "SELECT * FROM gymusers WHERE facebookID='$facebookID'";
$execQuery = mysqli_query($connect, $checkQuery);
$queryResult = mysqli_num_rows($execQuery);
// $_SESSION['FB_ID'] = $facebook_ID;
// $_SESSION['FB_NAME'] = $fullName;
if($queryResult > 0){
    echo "Already exist\n";
}
else{
    $insertQuery = "INSERT INTO gymusers (facebookID, fullName, accountStatus, role, accountCreated)"
        . "VALUES ('$facebookID', '$fullName','Active','user','NOW()')";
    //$insertQuery = "INSERT INTO user (facebookID, fullName) VALUES ('$facebookID', '$fullName')";
    $execQuery = mysqli_query($connect, $insertQuery);
    echo $insertQuery;
    if($execQuery == TRUE){
        echo "\nInsert Successfull";
    }
    else{
        echo "\nInsert Fail";
    }
}
?>