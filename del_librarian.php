<?php
require_once("is_login.php");
require_once("check_admin.php");
open_only_admin();
$id=$_GET['id'];
require_once("db.php");
require("config.php");
$sql = "DELETE FROM Librarian WHERE LibrarianId=".$id;
$query = mysqli_query($con,$sql);
mysqli_close($con);
header("Location: ./librarian.php");
exit; 
?>