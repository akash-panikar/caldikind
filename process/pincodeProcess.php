<?php
$pincode = $_POST['pincode'];
$getData = file_get_contents('https://api.postalpincode.in/pincode/'.$pincode);
$decodeData = json_decode($getData);
if($isset($getData->Postoffice['0'])){
    $arr['city'] = $data->Postoffice['0']->Taluk;
    $arr['state'] = $data->Postoffice['0']->State;
    echo json_encode($arr);
}
else{
    echo 'NO data';
}

?>


Your client ID
1069241768657-fm5s8dhnrkdg39jjb80hrbk5u82hp1jf.apps.googleusercontent.com

Your Client Secret
IjwPNlkt90Wb_EVJ8J8kyDRW