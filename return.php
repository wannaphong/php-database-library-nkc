<?php
require_once("is_login.php");
require_once("db.php");
$id=$_GET["borrowid"];
$sql = "INSERT INTO Bookreturn (BorrowID,Date_of_Return) VALUES ('".$id."', NOW())";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
header("Location: borrow.php");
exit();
?>