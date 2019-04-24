<?php
require_once("is_login.php");
require_once("check_admin.php");
open_only_admin();
require_once("db.php");
$name=$_POST['name'];
$id=$_POST['id'];
$address=$_POST['address'];
$DOB=$_POST['dob'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$sql = "UPDATE Students SET Name = '".$name."',Address = '".$address."',DOB='".$DOB."',Gender='".$gender."',Phone='".$phone."' WHERE  StudentId=".$id;
$query=mysqli_query($con,$sql);
if($query) {
    
    header("Location: ./student.php");
    exit();
}
else{
    echo "ระบบมีปัญหา";
}
?>