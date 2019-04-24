<?php
require_once("is_login.php");
/*
บันทึกการยืมหนังสือ
*/
require_once("db.php");
$LibrarianId=$_COOKIE['user'];
$StudentId=$_POST['StudentId'];
$BookId=$_POST['BookId'];
$Date_of_borrow= date('Y-m-d H:i:s');
$sql = "INSERT INTO Borrow(LibrarianId,StudentId,BookId,Date_of_borrow) VALUES ('".$LibrarianId."', '".$StudentId."','".$BookId."', '".$Date_of_borrow."')";
mysqli_query($con,$sql);
mysqli_commit($con);

echo "เพิ่มข้อมูลสำเร็จ";
?>