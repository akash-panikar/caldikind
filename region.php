<?php
//print_r($_POST);
$pincode= $_POST['pincode'];
$data= file_get_contents('http://postalpincode.in/api/pincode'.$pincode);
echo $data;
?>