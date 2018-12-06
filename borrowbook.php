<?php
require_once("check_studentid.php");
require_once("is_login.php");
require_once("db.php");
require("config.php");
$id=$_GET["bookid"];
$dt = new \DateTime(date("Y-m-d").' +5 day');
$new_date_format = $dt->format('Y-m-d');
$sql = "INSERT INTO Borrow (LibrarianId,BookId,StudentId,Date_of_borrow,Deadlines) VALUES (".$_COOKIE['user'].", '".$id."', '".$_COOKIE["studentid"]."',NOW(),'".$new_date_format."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
header("Location: borrow.php");
exit();
?>