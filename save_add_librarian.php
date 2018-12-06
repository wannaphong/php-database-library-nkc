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
$user=$_POST['user'];
$pass=$_POST['pass'];
//$Gender=$_POST['gender'];
$Address=$_POST['address'];
$sql = "INSERT INTO Librarian (IDcard,username,password,Name,Address,status) VALUES ('".$IDcard."', '".$user."', '".$pass."','".$Name."','".$Address."','user')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
header("Location: ./librarian.php");
exit();
?>