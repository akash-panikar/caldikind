<?php

include '../includes/include_once/db.php';
// Add Staff Process
if (isset($_POST['submit'])) {
    $staffFullname = $_POST['sfname'];
    $staffEmail = $_POST['semail'];
    $staffprimContact = $_POST['sprimaryno'];
    $staffAltContact = $_POST['salternateno'];
    $staffDOB = $_POST['sDOB'];
    $staffGender = $_POST['sgender'];
    $staffMarital = $_POST['marstatus'];
    $staffAddr1 = $_POST['saddr1'];
    $staffAddr2 = $_POST['saddr2'];
    $staffCity = $_POST['scity'];
    $staffState = $_POST['state'];
    $staffPincode = $_POST['pincode'];
    $staffJoining = $_POST['joindate'];
    $staffShiftTime = $_POST['shifttime'];
//    $staffShiftTo = $_POST['shiftto'];
    $staffDesignation = $_POST['designation'];
    $staffProfilePic = $_FILES['profilePic'];
    $staffMarksheet = $_FILES['marksheet'];
    $staffCertification = $_FILES['certification'];
    $staffIDProof = $_FILES['idproof'];
    if (empty($_POST['status'])) {
        $staffAccount = 'NO';
    } else {
        $staffAccount = 'YES';
    }

//    print_r($_FILES['idproof']);
//    exit();
    // Taking filename 
    $fileProfilePic = $staffProfilePic['name'];
    $fileMarksheet = $staffMarksheet['name'];
    $fileCertification = $staffCertification['name'];
    $fileIdProof = $staffIDProof['name'];
    // file type
//    $fileProfilePicType = $staffProfilePic['type'];
//    $fileMarksheetType = $staffMarksheet['type'];
//    $fileCertificationType = $staffCertification['type'];
//    $fileIdProofType = $staffIDProof['type'];
    // file size
    $fileProfilePicSize = $staffProfilePic['size'];
    $fileMarksheetSize = $staffMarksheet['size'];
    $fileCertificationSize = $staffCertification['size'];
    $fileIdProofSize = $staffIDProof['size'];

    // error holding variable
    $fileProfileError = $staffProfilePic['error'];
    $fileMarksheetError = $staffMarksheet['error'];
    $fileCertificationError = $staffCertification['error'];
    $fileIdProofError = $staffIDProof['error'];

    // hold files at temperory location
    $fileProfileTmp = $staffProfilePic['tmp_name'];
    $fileMarksheetTmp = $staffMarksheet['tmp_name'];
    $fileCertificationTmp = $staffCertification['tmp_name'];
    $fileIdProofTmp = $staffIDProof['tmp_name'];

    // explode filename to get extension
    $fileProfileExtension = explode('.', $fileProfilePic);
    $fileMarksheetExtension = explode('.', $fileMarksheet);
    $fileCertificationExtension = explode('.', $fileCertification);
    $fileIdProofExtension = explode('.', $fileIdProof);

    //convert extension in lower case
    $fileProfileLower = strtolower(end($fileProfileExtension));
    $fileMarksheetLower = strtolower(end($fileMarksheetExtension));
    $fileCertificationLower = strtolower(end($fileCertificationExtension));
    $fileIdProofLower = strtolower(end($fileIdProofExtension));

    // allowing to store only below extensions
    $fileStoreExtension = array('png', 'jpg', 'jpeg');

    //  saving profile picture
//    if(in_array($fileProfileLower, $fileStoreExtension)){
//        $profileFileLocation = '../images/people/'.$fileProfilePic;
//        move_uploaded_file($fileProfileTmp, $profileFileLocation);
//    }

    $userquery = "SELECT sPrimaryContact FROM gymstaff WHERE sPrimaryContact = '$staffprimContact'";
    $Result = mysqli_query($connect, $userquery);
    $checkUser = mysqli_num_rows($Result);
    if ($checkUser > 0) {
        echo 'Already exist';
        //mysqli_close($connect);
    } else {
        //  saving profile picture
        if (in_array($fileProfileLower, $fileStoreExtension)) {
            if ($fileProfilePicSize < 1048576) {
                $newProfilePicName = uniqid($staffFullname, false);
                $profileFileLocation = '0';
                $profileFileLocation = '../images/people/' . $newProfilePicName . '.' . $fileProfileLower;
                //move_uploaded_file($fileProfileTmp, $profileFileLocation);
            } else {
                echo 'file is too big';
                //header('Location:../staff.php');
            }
        }

        // saving document (Marksheet)
        if (in_array($fileMarksheetLower, $fileStoreExtension)) {
            if ($fileMarksheetSize < 1048576) {
                $newMarksheetName = uniqid($staffFullname, false);
                $marksheetFileLocation = '0';
                $marksheetFileLocation = '../documents/staff_Doc/' . $newMarksheetName . '.' . $fileMarksheetLower;
                //move_uploaded_file($fileMarksheetTmp, $marksheetFileLocation);
            } else {
                echo 'file is too big';
                //header('Location:../staff.php');
            }
        }

        // saving document (Certification)
        if (in_array($fileCertificationLower, $fileStoreExtension)) {
            if ($fileCertificationSize < 1048576) {
                $newCertificateName = uniqid($staffFullname, false);
                $certificationFileLocation = '0';
                $certificationFileLocation = '../documents/staff_Doc/' . $newCertificateName . '.' . $fileCertificationLower;
                //move_uploaded_file($fileCertificationTmp, $certificationFileLocation);
            } else {
                echo 'file is too big';
                //header('Location:../staff.php');
            }
        }

        // saving document (ID Proof)
        if (in_array($fileIdProofLower, $fileStoreExtension)) {
            if ($fileIdProofSize < 1048576) {
                $newIdProofName = uniqid($staffFullname, false);
                $idFileLocation = '0';
                $idFileLocation = '../documents/staff_Doc/' . $newIdProofName . '.' . $fileIdProofLower;
                //move_uploaded_file($fileIdProofTmp, $idFileLocation);
            } else {
                echo 'file is too big';
                //header('Location:../staff.php');
            }
        }
        $staffInsert = "INSERT INTO gymstaff (profilePicture,sName, sEmail, sPrimaryContact, sAlternateContact, sDOB, sGender,"
                . "sMaritalStatus, sAddress1, sAddress2, sCity, sState, sPincode, sJoiningDate, sShiftTime, sDesignation,"
                . "sSchoolCert, sCertification, sPhotoIDProof, sAccountStatus) VALUES ('$profileFileLocation','$staffFullname',"
                . "'$staffEmail', '$staffprimContact', '$staffAltContact', '$staffDOB', '$staffGender', '$staffMarital',"
                . "'$staffAddr1', '$staffAddr2', '$staffCity', '$staffState', '$staffPincode', '$staffJoining',"
                . "'$staffShiftTime', '$staffDesignation', '$marksheetFileLocation', '$certificationFileLocation', '$idFileLocation', '$staffAccount')";
        $query = mysqli_query($connect, $staffInsert);

        if ($query == true) {

            move_uploaded_file($fileProfileTmp, $profileFileLocation);
            move_uploaded_file($fileMarksheetTmp, $marksheetFileLocation);
            move_uploaded_file($fileCertificationTmp, $certificationFileLocation);
            move_uploaded_file($fileIdProofTmp, $idFileLocation);
            //echo "Data inserted";
            mysqli_close($connect);
            //header('Location:../staff.php');
            $subject = "Welcome to TRYON";
            $body = "Dear $staffFullname,"
                ."\nWelcome to the Tryon Family!"
                ."\nAt the outset, I would like to congratulate you for having fared so well in the interview process"
                . " and for having made a definite impression in the minds of those who have interacted with you during"
                . " the interviews. I am sure that going forward, this impression will only grow stronger."
                . "\nAs a <strong>$staffDesignation</strong>, your role is critical in fulfilling the mission of the Gym."
                . "\nWe expect you to set an example of diligence, dedication and commitment and contribute your"
                . " best efforts in making a gym leading the market."
                . "\nI hope the induction session you went through was informative, and has helped you understand and identify"
                . " collegoues better. Please feel free to get in touch with us for any further information / clarifications you may need."
                . "\n"
                . "\nWishing you luck for all your assignments and a long and rewarding career at";

            $headers = "From: newopenlearningschool@gmail.com";

            if (mail($staffEmail, $subject, $body, $headers)) {
                echo "Email successfully sent to $staffEmail.";
                header('Location:../staff.php');
            } else {
                echo "Email sending failed...";
            }
            exit();
        } else {
            echo "failed";
//                 echo $staffInsert;
        }
        //mysqli_close($connect);
    }
//    exit();
}

// Edit Staff Process
if (isset($_POST['update'])) {
    $rowID = $_POST['rowID'];
    $staffEditProfilePic = $_FILES['profilePic'];
    $staffEditFullname = $_POST['sfname'];
    $staffEditEmail = $_POST['semail'];
    $staffEditprimContact = $_POST['sprimaryno'];
    $staffEditAltContact = $_POST['salternateno'];
    $staffEditDOB = $_POST['sDOB'];
    $staffEditGender = $_POST['sgender'];
    $staffEditMarital = $_POST['marstatus'];
    $staffEditAddr1 = $_POST['saddr1'];
    $staffEditAddr2 = $_POST['saddr2'];
    $staffEditCity = $_POST['scity'];
    $staffEditState = $_POST['state'];
    $staffEditPincode = $_POST['pincode'];
    $staffEditJoining = $_POST['joindate'];
    $staffEditShiftTime = $_POST['shifttime'];
    $staffEditDesignation = $_POST['designation'];
    $staffEditMarksheet = $_FILES['marksheet'];
    $staffEditCertification = $_FILES['certification'];
    $staffEditIDProof = $_FILES['idproof'];
    if (empty($_POST['status'])) {
        $staffEditAccountStatus = 'NO';
    } else {
        $staffEditAccountStatus = 'YES';
    }
    //print_r($_FILES);
    // Taking filename 
    $fileProfilePic = $staffEditProfilePic['name'];
    $fileMarksheet = $staffEditMarksheet['name'];
    $fileCertification = $staffEditCertification['name'];
    $fileIdProof = $staffEditIDProof['name'];
    // file type
//    $fileProfilePicType = $staffProfilePic['type'];
//    $fileMarksheetType = $staffMarksheet['type'];
//    $fileCertificationType = $staffCertification['type'];
//    $fileIdProofType = $staffIDProof['type'];
    // file size
    $fileProfilePicSize = $staffEditProfilePic['size'];
    $fileMarksheetSize = $staffEditMarksheet['size'];
    $fileCertificationSize = $staffEditCertification['size'];
    $fileIdProofSize = $staffEditIDProof['size'];

    // error holding variable
    $fileProfileError = $staffEditProfilePic['error'];
    $fileMarksheetError = $staffEditMarksheet['error'];
    $fileCertificationError = $staffEditCertification['error'];
    $fileIdProofError = $staffEditIDProof['error'];

    // hold files at temperory location
    $fileProfileTmp = $staffEditProfilePic['tmp_name'];
    $fileMarksheetTmp = $staffEditMarksheet['tmp_name'];
    $fileCertificationTmp = $staffEditCertification['tmp_name'];
    $fileIdProofTmp = $staffEditIDProof['tmp_name'];

    // explode filename to get extension
    $fileProfileExtension = explode('.', $fileProfilePic);
    $fileMarksheetExtension = explode('.', $fileMarksheet);
    $fileCertificationExtension = explode('.', $fileCertification);
    $fileIdProofExtension = explode('.', $fileIdProof);

    //convert extension in lower case
    $fileProfileLower = strtolower(end($fileProfileExtension));
    $fileMarksheetLower = strtolower(end($fileMarksheetExtension));
    $fileCertificationLower = strtolower(end($fileCertificationExtension));
    $fileIdProofLower = strtolower(end($fileIdProofExtension));

    // allowing to store only below extensions
    $fileStoreExtension = array('png', 'jpg', 'jpeg');

    //  saving profile picture
//    if(in_array($fileProfileLower, $fileStoreExtension)){
//        $profileFileLocation = '../images/people/'.$fileProfilePic;
//        move_uploaded_file($fileProfileTmp, $profileFileLocation);
//    }
    //  saving profile picture
    if (in_array($fileProfileLower, $fileStoreExtension)) {
        if ($fileProfilePicSize < 1048576) {
            $newProfilePicName = uniqid($staffEditFullname, false);
            $profileFileLocation = '../images/people/' . $newProfilePicName . '.' . $fileProfileLower;
            //move_uploaded_file($fileProfileTmp, $profileFileLocation);
        } else {
            echo 'file is too big';
            //header('Location:../staff.php');
        }
    }

    // saving document (Marksheet)
    if (in_array($fileMarksheetLower, $fileStoreExtension)) {
        if ($fileMarksheetSize < 1048576) {
            $newMarksheetName = uniqid($staffEditFullname, false);
            $marksheetFileLocation = '../documents/staff_Doc/' . $newMarksheetName . '.' . $fileMarksheetLower;
            //move_uploaded_file($fileMarksheetTmp, $marksheetFileLocation);
        } else {
            echo 'file is too big';
            //header('Location:../staff.php');
        }
    }

    // saving document (Certification)
    if (in_array($fileCertificationLower, $fileStoreExtension)) {
        if ($fileCertificationSize < 1048576) {
            $newCertificateName = uniqid($staffEditFullname, false);
            $certificationFileLocation = '../documents/staff_Doc/' . $newCertificateName . '.' . $fileCertificationLower;
            //move_uploaded_file($fileCertificationTmp, $certificationFileLocation);
        } else {
            echo 'file is too big';
            //header('Location:../staff.php');
        }
    }

    // saving document (ID Proof)
    if (in_array($fileIdProofLower, $fileStoreExtension)) {
        if ($fileIdProofSize < 1048576) {
            $newIdProofName = uniqid($staffEditFullname, false);
            $idFileLocation = '../documents/staff_Doc/' . $newIdProofName . '.' . $fileIdProofLower;
            //move_uploaded_file($fileIdProofTmp, $idFileLocation);
        } else {
            echo 'file is too big';
            //header('Location:../staff.php');
        }
    }

    $updateQuery = "UPDATE gymstaff "
            . "SET sName='$staffEditFullname'"
            . ", sEmail='$staffEditEmail'"
            . ", sPrimaryContact='$staffEditprimContact'"
            . ", sAlternateContact='$staffEditAltContact'"
            . ", sDOB='$staffEditDOB'"
            . ", sGender='$staffEditGender'"
            . ", sMaritalStatus='$staffEditMarital'"
            . ", sAddress1='$staffEditAddr1'"
            . ", sAddress2='$staffEditAddr2'"
            . ", sCity='$staffEditCity'"
            . ", sState='$staffEditState'"
            . ", sPincode='$staffEditPincode'"
            . ", sJoiningDate='$staffEditJoining'"
            . ", sShiftTime='$staffEditShiftTime'"
            . ", sDesignation='$staffEditDesignation'"
            . ", profilePicture='$profileFileLocation'"
            . ", sSchoolCert='$marksheetFileLocation'"
            . ", sCertification='$certificationFileLocation'"
            . ", sPhotoIDProof='$idFileLocation'"
            . ", sAccountStatus='$staffEditAccountStatus' WHERE sID=$rowID";
    $execUpdate = mysqli_query($connect, $updateQuery);
    if ($execUpdate == TRUE) {
        move_uploaded_file($fileProfileTmp, $profileFileLocation);
        move_uploaded_file($fileMarksheetTmp, $marksheetFileLocation);
        move_uploaded_file($fileCertificationTmp, $certificationFileLocation);
        move_uploaded_file($fileIdProofTmp, $idFileLocation);
        header('Location:../test2.php');
        echo '<div class = "alert alert-success" role = "alert">
            Changes Updated.
        </div>';
        mysqli_close($connect);
    } else {
        echo "error occured";
    }
}

// Delete Staff Process
if (isset($_POST['delete'])) {
    $deleteRowID = $_GET['id'];
    echo $deleteRowID;
    $deleteRecord = "DELETE FROM gymstaff WHERE sID='$deleteRowID'";
    $execQuery = mysqli_query($connect, $deleteRecord);
    if ($execQuery == TRUE) {
        header('Location:../staff.php');
        exit();
    }
}
?>
<?php

// echo htmlentities($_SERVER['PHP_SELF']); ?>