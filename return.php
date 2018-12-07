<?php
require_once("is_login.php");
require_once("check_studentid.php");
require_once("db.php");
$id=$_GET["borrowid"];
$Fine=$_GET["Fine"];
$sql = "INSERT INTO Bookreturn (BorrowID,Date_of_Return,Fine) VALUES ('".$id."', NOW(),'".$Fine."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
header("Location: borrow.php");
exit();
?>