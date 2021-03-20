<!-- /////////////////////////
Create By: Akash Panikar     |
Date: 13/11/2020             |
Last Modified on:            |  
////////////////////////////// -->
<?php
date_default_timezone_set("Asia/Kolkata");
$currentDateTime = date('H:i:s');
$server = "localhost";
$user = "root";
$password = "";
$db = "tryon";

$connect = mysqli_connect("$server","$user", "$password","$db");

if($connect == true)
{
    //echo "db connected succesful";
}
else
{
    echo "connection fail, check kar !!!";
    die;
}



?>