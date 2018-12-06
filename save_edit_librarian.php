<?php
require_once("is_login.php");
require_once("check_admin.php");
open_only_admin();
require_once("db.php");
$name=$_POST['name'];
$id=$_POST['id'];
$address=$_POST['address'];
$sql = "UPDATE Librarian SET Name = '".$name."',Address = '".$address."' WHERE LibrarianId=".$id;
$query=mysqli_query($con,$sql);
if($query) {
    mysqli_close($con);
    header("Location: ./librarian.php");
    exit();
}
else{
    echo "ระบบมีปัญหา";
}
?>