<?php
setcookie("user","",1,'/');
unset($_COOKIE["user"]);
if (isset($_COOKIE['studentid']))
{
    setcookie("studentid","",1,'/');
    unset($_COOKIE["studentid"]);
}
header("Location: index.php");
exit; 
?>