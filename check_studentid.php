<?php
if (!isset($_COOKIE['studentid']))
{
        header("Location: index.php");
        exit();
}
?>