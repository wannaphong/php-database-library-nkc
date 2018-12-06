<?php
require_once("check_studentid.php");
require_once("is_login.php");
require_once("db.php");
require("config.php");
$id=$_GET["borrowid"];
$sql = "DELETE FROM Borrow WHERE BorrowId=".$id;
$query = mysqli_query($con,$sql);
mysqli_close($con);
header("Location: borrow.php");
exit; 
?>