<?php
require_once("is_login.php");
require_once("check_admin.php");
open_only_admin();
require_once("db.php");
$pass=$_POST['pass'];
$id=$_POST['id'];
$sql = "UPDATE Librarian SET password = '".$pass."' WHERE LibrarianId=".$id;
$query=mysqli_query($con,$sql);
if($query) {
    
    header("Location: ./librarian.php");
    exit();
}
else{
    echo "ระบบมีปัญหา";
}
?>