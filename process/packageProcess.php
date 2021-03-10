<?php
include '../includes/include_once/db.php';

if(isset($_POST['submit'])){
    $packageName = $_POST['packname'];
    $packageDescription = $_POST['description'];
    $packageAmount = $_POST['amount'];
    
    $insertPackage = "INSERT into gympackage (pName, pDescription, pRegularAmount) VALUES ('$packageName', '$packageDescription', '$packageAmount')";
    $execQuery = mysqli_query($connect, $insertPackage);
    
    if($execQuery == TRUE){
        echo "Data Inserted";
        mysqli_close($connect);
        header('Location:../settings.php');
    } else {
        echo "Insert Failed";
        echo $insertPackage;
    }
}


?>