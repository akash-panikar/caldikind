<?php

include('../includes/include_once/db.php');
if(isset($_POST['renew_id'])){
 $id = $_POST['renew_id'];
 $sql = "SELECT * FROM temp_client WHERE tID = '$id'";
 $results = mysqli_query($connect, $sql);
 $data = array();
 while($result = mysqli_fetch_array($results)){
     $data['id'] = $result['tID'];
     $data['name'] = $result['fullName'];
     $data['contactNo'] = $result['contactNo'];
     $data['amtdue'] = $result['amountDue'];
     $data['expired'] = $result['endDate'];
     $data['package'] = $result['packageName'];
 } 
 echo json_encode($data);
exit;
}

?>