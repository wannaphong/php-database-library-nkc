<?php
/*
เพิ่มข้อมูลบรรรักษ์
*/
require_once("is_login.php");
require_once("db.php");
$IDcard=$_POST['idcard'];
$Name=$_POST['name'];
$Gender=$_POST['gender'];
$Address=$_POST['address'];
$sql = "INSERT INTO Librarian (IDcard,Name,Gender,Address) VALUES ('".$IDcard."', '".$Name."', '".$Gender."','".$Address."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
echo "เพิ่มข้อมูลสำเร็จ";
?>