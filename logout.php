<?php
setcookie("user","",1,'/');
unset($_COOKIE["user"]);
if (isset($_COOKIE['studentid']))
{
    setcookie("studentid","",1,'/');
    unset($_COOKIE["studentid"]);
}
setcookie("status","",1,'/');
unset($_COOKIE["status"]);
header("Location: index.php");
exit; 
?>