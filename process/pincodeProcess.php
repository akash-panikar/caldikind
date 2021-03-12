<?php
$pincode = $_POST['pincode'];
$getData = file_get_contents('https://api.postalpincode.in/pincode/'.$pincode);
$decodeData = json_decode($getData);
//print_r($decodeData);
if(isset($decodeData->PostOffice['0'])){
//    $arr['city'] = $decodeData->PostOffice['0']->Taluk;
//    $arr['state'] = $decodeData->PostOffice['0']->State;
//    echo json_encode($arr);
    print_r($decodeData->PostOffice['0']);
}  else {
    echo 'No Data';
}

?>

