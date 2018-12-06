<?php
require_once("is_login.php");
$id=$_GET['stu_id'];
require_once("db.php");
require("config.php");
$sql = "DELETE FROM Students WHERE id=".$id;
$query = mysqli_query($con,$sql);
mysqli_close($con);
header("Location: student.php");
exit; 
?>