<?php
require_once("is_login.php");
require_once("check_admin.php");
open_only_admin();
require_once("db.php");
$right=$_POST["right"];
$id=$_POST["id"];
$sql = "UPDATE Librarian SET status='".$right."'  WHERE LibrarianId=".$id;
$query=mysqli_query($con,$sql);
if($query) {
    
    header("Location: ./librarian.php");
    exit();
}
else{
    echo "ระบบมีปัญหา";
}
?>