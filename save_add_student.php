<?php
require_once("is_login.php");
require_once("db.php");
$name=$_POST['name'];
$address=$_POST['address'];
$DOB=$_POST['dob'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$sql = "INSERT INTO Students (Name,Address,DOB,Gender,Phone) VALUES ('".$name."', '".$address."', '".$DOB."','".$gender."','".$phone."')";
mysqli_query($con,$sql);
mysqli_commit($con);
header("Location: student.php");
exit();
?>