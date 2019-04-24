<?php
require_once("is_login.php");
require_once("check_studentid.php");
require_once("db.php");
$id=$_GET["borrowid"];
$Fine=$_GET["Fine"];
$sql = "UPDATE Borrow SET Date_of_Return = NOW() WHERE BorrowId=$id";
mysqli_query($con,$sql);
mysqli_commit($con);

header("Location: borrow.php");
exit();
?>