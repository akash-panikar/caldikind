<?php
include '../includes/include_once/db.php';
if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $amountPaidBy = $_POST['paidby'];
    $categories = $_POST['categories'];
    $remark = $_POST['remark'];
    $query = "INSERT INTO gymexpense (date, eAmount, ePaidBy, eCategories, remark) VALUES ('$date', '$amount', '$amountPaidBy', '$categories', '$remark')";
    $exec = mysqli_query($connect, $query);
    if($exec == TRUE){
        header('Location:../expense.php');
    }
}