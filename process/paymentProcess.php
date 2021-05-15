<?php
include('includes/include_once/db.php');
if(isset($_POST['pay_id'])){
 $id = $_POST['pay_id'];
 $sql = "SELECT * FROM temp_client WHERE tID = '$id'";
 $query = mysqli_query($connect, $query);
 while($result = mysqli_fetch_array($result)){
     $id = $result['tID'];
     $name = $result['fullName'];
     $mobile = $result['contactNo'];
     $balamt = $result['amountDue'];
 } 
}

?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Client Name</label>
        <input type="text" class="form-control" id="fname" name="fname" value="<?= $result['fullName']; ?>">
    </div>
    <div class="form-group col-md-6">
        <label>Contact Number</label>
        <input type="text" class="form-control" id="cntno" name="cntno" value="<?= $result['contactNo']; ?>">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Balance Amount</label>
        <input type="text" class="form-control" name="balamount" id="" value="<?= $result['amountDue']; ?>">
    </div>
    <div class="form-group col-md-4">
        <label>Amount</label>
        <input type="text" class="form-control" name="amount" id="">
    </div>
    <div class="form-group col-md-4">
        <label>Payment Mode</label>
        <select class="form-control" name="usertype">
            <option selected disabled>Choose...</option>
            <option>Cash</option>
            <option>Card</option>
            <option>UPI</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label>Remark</label>
    <textarea class="form-control" name="remark"></textarea>
</div>