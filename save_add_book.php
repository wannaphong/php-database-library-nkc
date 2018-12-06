<?php
/*
เพิ่มข้อมูลหนังสือใหม่เข้าไป
*/
require_once("is_login.php");
require_once("db.php");
$namebook=$_POST['namebook'];
$author=$_POST['author'];
$category=$_POST['category'];
$publisher=$_POST['publisher'];
$sql = "INSERT INTO Books (NameBooks,Author,category,publisher) VALUES ('".$namebook."', '".$author."', '".$category."','".$publisher."')";
mysqli_query($con,$sql);
mysqli_commit($con);
mysqli_close($con);
?>