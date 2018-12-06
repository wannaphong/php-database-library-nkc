<?php
require_once("is_login.php");
setcookie("studentid","",1,'/');
unset($_COOKIE["studentid"]);
header("Location: student_id.php");
exit; 
?>