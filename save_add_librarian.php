<?php
/*
เพิ่มข้อมูลบรรรักษ์
*/
require_once("is_login.php");
require_once("check_admin.php");
open_only_admin();
require_once("db.php");
$IDcard=$_POST['idcard'];
$Name=$_POST['name'];
$Gender=$_POST['gender'];
$Address=$_POST['address'];
$sql = "INSERT INTO Librarian (IDcard,Name,Gender,Address,status) VALUES ('".$IDcard."', '".$Name."', '".$Gender."','".$Address."','user')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
echo "เพิ่มข้อมูลสำเร็จ";
?>