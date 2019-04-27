<?php
/*
แก้ไขข้อมูลหนังสือใหม่เข้าไป
*/
require_once("is_login.php");
require_once("db.php");
$id=$_POST['id'];
$namebook=$_POST['namebook'];
$author=$_POST['author'];
$category=$_POST['category'];
$publisher=$_POST['publisher'];
$sql = "UPDATE Books SET NameBooks='".$namebook."',Author='".$author."',categoryid='".$category."',publisher='".$publisher."' where BookId=".$id;
mysqli_query($con,$sql);
mysqli_commit($con);

header("Location: ./book.php");
exit();
?>