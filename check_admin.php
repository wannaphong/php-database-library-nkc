<?php
function is_admin() {
 if (isset($_COOKIE['status']))
 {
     if($_COOKIE['status']=="admin"){
   return true;
     }
     else{
         return false;
     }
}
else{
    return false;
}
}
function open_only_admin() {
if(!is_admin()){
    header("Location: ./index.php");
    exit();
}}
?>