<?php
/*
บันทึกการยืมหนังสือ
*/
require_once("db.php");
$LibrarianId=$_POST['LibrarianId'];
$StudentId=$_POST['StudentId'];
$Date_of_borrow= date('Y-m-d H:i:s');
$sql = "INSERT INTO Borrow(LibrarianId,StudentId,Date_of_borrow) VALUES ('".$LibrarianId."', '".$StudentId."', '".$Date_of_borrow."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
echo "เพิ่มข้อมูลสำเร็จ";
?>