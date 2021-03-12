<?php
session_start();
mysqli_close($connect);
unset($_SESSION["mID"]);
unset($_SESSION["fullName"]);
session_destroy();
header("Location:index.php");
?>