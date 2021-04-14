<?php
session_start(); 
if(!isset($_SESSION['fullName']))
{
    header('Location:index.php');
}?>