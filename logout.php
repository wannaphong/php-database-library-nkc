<?php
setcookie("user","",1,'/');
unset($_COOKIE["user"]);
header("Location: index.php");
exit; 
?>