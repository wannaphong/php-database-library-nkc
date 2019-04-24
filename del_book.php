<?php
require_once("is_login.php");
$id=$_GET['bookid'];
require_once("db.php");
require("config.php");
$sql = "DELETE FROM Books WHERE BookId=".$id;
$query = mysqli_query($con,$sql);

header("Location: book.php");
exit; 
?>