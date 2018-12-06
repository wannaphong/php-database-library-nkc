<?php
require_once("is_login.php");
require_once("db.php");
$id=$_GET["borrowid"];
$damages=$_GET["damages"];
$sql = "INSERT INTO Bookreturn (BorrowID,Date_of_Return,Damages) VALUES ('".$id."', NOW(),'".$damages."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
header("Location: borrow.php");
exit();
?>