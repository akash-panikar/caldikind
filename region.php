<?php
$pincode= $_POST['pincode'];
$getData = file_get_contents('https://api.postalpincode.in/pincode/'.$pincode);
$decodeData = json_decode($getData);
//print_r($decodeData);
if(isset($decodeData['0']->PostOffice)){
//    print_r($data['0']->PostOffice);
    $postoffice = $decodeData['0']->PostOffice;
    foreach($postoffice as $key=>$value){
        $arr[$key]['Locality'] = $value->Name;
        $arr[$key]['City'] = $value->Block;
    }    
    echo json_encode($arr);
} else {
    
    echo 'No Data';
}
?>