<?php

//function validate_input_text($textValue){       // validate text
//    if(!empty($textValue)){
//        $trimText = trim($textValue);   // This will remove illegal characters
//        $sanitize = filter_var($textValue,FILTER_SANITIZE_STRING);
//        return $sanitize;
//    }
//    return '';
//}
//
//function validate_input_email($emailValue){       // validate email
//    if(!empty($emailValue)){
//        $trimText = trim($emailValue);   // This will remove illegal characters
//        $sanitize = filter_var($emailValue,FILTER_SANITIZE_EMAIL);
//        return $sanitize;
//    }
//    return '';
//}


//function profile_picture($fileName){
//    $profilePicDir = "./images/people/";
//    $defaultPicture = "./images/people/6.png";
//    // get filename
//    $$fileName = basename($fileName['name']);
//    $filePath = $profilePicDir.$fileName;
//    $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
//    
//    if(!empty($fileName)){
//        // allow certain file format only.
//        $fileFormat = array('jpg','jpeg','png');
//        if(in_array($fileType, $fileFormat)){
//            // upload file to a server
//            if(move_uploaded_file($fileName[temp_name], $filePath)){
//                return $filePath;
//            }
//        }
//    }
//    // return default image
//    return "./images/people/".$defaultPicture;
//}

//===================== this is how to take variable on staffProcess.php==================

//
//$staffFullname = validate_input_text($_POST['sfname']);
//if(empty($staffFullname)){
//    $error = "Please enter your name";
//}
?>