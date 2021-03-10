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

    $insertEnquiry = "INSERT INTO gymenquiry (vName, vEmail, vMobile, vMobile2, vGender, vLocation, vType, remark, date) VALUES "
            . "('$enquiryPersonName', '$enquiryPersonEmail', '$enquiryPersonPrimaryContact', $enquiryPersonAlternateContact, '$enquiryPersonGender', '$enquiryPersonLocation',"
            . "'$enquiryPersonEnquiryType', '$enquiryPersonRemark', NOW())";
    $query = mysqli_query($connect, $insertEnquiry);

    if ($query == true) {
                echo "Data inserted";
                echo $insertEnquiry;
                mysqli_close($connect);
    } else {
        echo "failed";
        echo $insertEnquiry;
    }
}
?>