<?php

include '../includes/include_once/db.php';

if (isset($_POST['submit'])) {
    $enquiryPersonName = $_POST['fname'];
    $enquiryPersonEmail = $_POST['email'];
    $enquiryPersonPrimaryContact = $_POST['primarycontact'];
    $enquiryPersonAlternateContact = $_POST['alternatecontact'];
    $enquiryPersonGender = $_POST['gender'];
    $enquiryPersonLocation = $_POST['address'];
    $enquiryPersonEnquiryType = $_POST['enqtype'];
    $enquiryPersonRemark = $_POST['remark'];

    $insertEnquiry = "INSERT INTO gymenquiry (vName, vEmail, vMobile, vMobile2, vGender, vLocation, vType, remark) VALUES "
            . "('$enquiryPersonName', '$enquiryPersonEmail', '$enquiryPersonPrimaryContact', '$enquiryPersonAlternateContact', '$enquiryPersonGender', '$enquiryPersonLocation',"
            . "'$enquiryPersonEnquiryType', '$enquiryPersonRemark')";
    $query = mysqli_query($connect, $insertEnquiry);

    if ($query == true) {
        $subject = "Welcome to TRYON";
        $body = "Greetings $enquiryPersonName,\n\nThanks for your interest in our service.\nWe hope the given information addresses your needs."
                . " If you require further clarifications, please do not hesitate to contact us.\nWe look forward to hear from you soon.\n"
                . "Sincerly\n\n[Team Tryon]";
        $headers = "From: TRYON <tryongymsoftware@gmail.com>";
        mail($enquiryPersonEmail, $subject, $body, $headers);
//                echo $insertEnquiry;
        mysqli_close($connect);
        header("Location:../enquiry.php");
                
    } else {
        echo "failed";
        echo $insertEnquiry;
    }
}

// Edit Enquiry Process
if (isset($_POST['update'])) {
    $rowID = $_POST['rowID'];
    $enquiryEditFullname = $_POST['fname'];
    $enquiryEditEmail = $_POST['email'];
    $enquiryEditprimContact = $_POST['eprimaryno'];
    $enquiryEditAltContact = $_POST['ealterno'];
    $enquiryEditRemark = $_POST['remark'];
    $updateQuery = "UPDATE gymenquiry "
            . "SET vName='$enquiryEditFullname'"
            . ", vEmail='$enquiryEditEmail'"
            . ", vMobile='$enquiryEditprimContact'"
            . ", vMobile2='$enquiryEditAltContact'"
            . ", remark='$enquiryEditRemark'"
            . " WHERE vID=$rowID";
    $execUpdate = mysqli_query($connect, $updateQuery);
    if ($execUpdate == TRUE) {
        header('Location:../enquiry.php');
        echo '<div class = "alert alert-success" role = "alert">Changes Updated.</div>';
        mysqli_close($connect);
    } else {
        echo $updateQuery;
        echo "error occured";
    }
}

if (isset($_POST['ni'])) {
    $moveRowID = $_GET['id'];
    echo $deleteRowID;
    $changeRecordStatus = "UPDATE gymenquiry SET status='Not Interested' WHERE vID=$moveRowID"; //"DELETE FROM gymstaff WHERE vID='$moveRowID'";
    $execQuery = mysqli_query($connect, $changeRecordStatus);
    if ($execQuery == TRUE) {
        header('Location:../enquiry.php');
        exit();
    }
}

?>