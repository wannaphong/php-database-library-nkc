<?php
session_start();
/*
บันทึกการยืมหนังสือ
*/
require_once("db.php");
$LibrarianId=$_SESSION['username'];
$StudentId=$_POST['StudentId'];
$BookId=$_POST['BookId'];
$Date_of_borrow= date('Y-m-d H:i:s');
$sql = "INSERT INTO Borrow(LibrarianId,StudentId,BookId,Date_of_borrow) VALUES ('".$LibrarianId."', '".$StudentId."','".$BookId."', '".$Date_of_borrow."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
echo "เพิ่มข้อมูลสำเร็จ";
?>